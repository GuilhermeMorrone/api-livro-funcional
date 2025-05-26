<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    
    public function index()
    {
        $autores = Autor::with('livros')->get();
        return response()->json($autores);
    }

    
    public function show($id)
    {
        $autor = Autor::with('livros')->findOrFail($id);
        return response()->json($autor);
    }

   
    public function listarLivros($id)
    {
        $autor = Autor::findOrFail($id);
        $livros = $autor->livros;
        return response()->json($livros);
    }


    public function store(Request $request)
    {
        $autor = Autor::create($request->all());
        return response()->json($autor, 201);
    }

    
    public function update(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return response()->json($autor);
    }

   
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return response()->json(null, 204);
    }
}
