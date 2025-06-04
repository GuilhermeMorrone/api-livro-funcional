<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Http\Resources\AutorResource;
use App\Http\Resources\LivroResource;

class AutorController extends Controller
{
    // Listar todos os autores
    public function index()
    {
        $autores = Autor::all();
        return AutorResource::collection($autores);
    }

    // Buscar autor por ID
    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return new AutorResource($autor);
    }

    // Criar autor
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'biografia' => 'nullable|string',
        ]);

        $autor = Autor::create($request->only('nome', 'data_nascimento', 'biografia'));

        return new AutorResource($autor);
    }

    // Atualizar autor
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'data_nascimento' => 'sometimes|required|date',
            'biografia' => 'nullable|string',
        ]);

        $autor = Autor::findOrFail($id);
        $autor->update($request->only('nome', 'data_nascimento', 'biografia'));

        return new AutorResource($autor);
    }

    // Deletar autor + livros e reviews relacionados
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);

        foreach ($autor->livros as $livro) {
            $livro->reviews()->delete(); 
            $livro->delete();
        }

        $autor->delete();

        return response()->json(null, 204);
    }

    // Listar autores com seus livros (rota extra)
    public function listarAutoresComLivros()
    {
        $autores = Autor::with('livros')->get();
        return AutorResource::collection($autores);
    }

    // Listar livros de um autor (rota extra)
    public function listarLivros($id)
    {
        $autor = Autor::findOrFail($id);
        $livros = $autor->livros;
        return LivroResource::collection($livros);
    }
}
