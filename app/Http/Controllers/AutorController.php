<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Http\Resources\AutorResource;
use App\Http\Resources\LivroResource;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::with('livros')->get();
        return AutorResource::collection($autores);
    }

    public function show($id)
    {
        $autor = Autor::with('livros')->findOrFail($id);
        return AutorResource::make($autor);
    }

    public function listarLivros($id)
    {
        $autor = Autor::findOrFail($id);
        $livros = $autor->livros;
        return LivroResource::collection($livros);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            // adicione outras validações que forem necessárias
        ]);

        $autor = Autor::create($request->all());
        return AutorResource::make($autor);
    }

    public function update(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            // adicione outras validações que forem necessárias
        ]);

        $autor->update($request->all());
        return AutorResource::make($autor);
    }

    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return response()->json(null, 204);
    }
}
