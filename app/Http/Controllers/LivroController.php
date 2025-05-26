<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    
    public function index()
    {
        $livros = Livro::with(['reviews', 'autor', 'genero'])->get();
        return response()->json($livros);
    }

    
    public function show($id)
    {
        $livro = Livro::with(['reviews', 'autor', 'genero'])->findOrFail($id);
        return response()->json($livro);
    }

    
    public function listarReviews($id)
    {
        $livro = Livro::findOrFail($id);
        $reviews = $livro->reviews; 
        return response()->json($reviews);
    }

  
    public function store(Request $request)
    {
        $livro = Livro::create($request->all());
        return response()->json($livro, 201);
    }

   
    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);
        $livro->update($request->all());
        return response()->json($livro);
    }

    
    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return response()->json(null, 204);
    }
}
