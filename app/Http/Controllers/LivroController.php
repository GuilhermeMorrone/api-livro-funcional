<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use App\Http\Resources\LivroResource;
use App\Http\Resources\ReviewResource;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with(['reviews', 'autor', 'genero'])->get();
        return LivroResource::collection($livros);
    }

    public function show($id)
    {
        $livro = Livro::with(['reviews', 'autor', 'genero'])->findOrFail($id);
        return LivroResource::make($livro);
    }

    public function listarReviews($id)
    {
        $livro = Livro::findOrFail($id);
        $reviews = $livro->reviews;
        return ReviewResource::collection($reviews);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'genero_id' => 'nullable|exists:generos,id',
            // demais validações que você precise
        ]);

        $livro = Livro::create($request->all());
        return LivroResource::make($livro)->response()->setStatusCode(201);
    }

    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);

        $request->validate([
            'titulo' => 'sometimes|required|string|max:255',
            'autor_id' => 'sometimes|required|exists:autores,id',
            'genero_id' => 'nullable|exists:generos,id',
        ]);

        $livro->update($request->all());
        return LivroResource::make($livro);
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return response()->json(null, 204);
    }
}
