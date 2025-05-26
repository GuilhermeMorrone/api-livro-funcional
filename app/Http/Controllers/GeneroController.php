<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    
    public function index()
    {
        $generos = Genero::with('livros')->get();
        return response()->json($generos);
    }

    
    public function show($id)
    {
        $genero = Genero::with('livros')->findOrFail($id);
        return response()->json($genero);
    }

    
    public function listarLivros($id)
    {
        $genero = Genero::findOrFail($id);
        $livros = $genero->livros;
        return response()->json($livros);
    }

    public function store(Request $request)
    {
        $genero = Genero::create($request->all());
        return response()->json($genero, 201);
    }

    
    public function update(Request $request, $id)
    {
        $genero = Genero::findOrFail($id);
        $genero->update($request->all());
        return response()->json($genero);
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
