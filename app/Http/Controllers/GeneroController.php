<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use App\Http\Resources\GeneroResource;
use App\Http\Resources\LivroResource;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::with('livros')->get();
        return GeneroResource::collection($generos);
    }

    public function show($id)
    {
        $genero = Genero::with('livros')->findOrFail($id);
        return GeneroResource::make($genero);
    }

    public function listarGenerosComLivros()
    {
        $generos = Genero::with('livros')->get();
        return GeneroResource::collection($generos);
    }

    public function listarLivros($id)
    {
        $genero = Genero::findOrFail($id);
        $livros = $genero->livros;
        return LivroResource::collection($livros);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $genero = Genero::create($request->all());
        return GeneroResource::make($genero);
    }

    public function update(Request $request, $id)
    {
        $genero = Genero::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
        ]);

        $genero->update($request->all());
        return GeneroResource::make($genero);
    }

    public function destroy($id)
    {
        $genero = Genero::findOrFail($id);

        foreach ($genero->livros as $livro) {
            $livro->genero_id = null;
            $livro->save();
        }

        $genero->delete();
        return response()->json(null, 204);
    }
}
