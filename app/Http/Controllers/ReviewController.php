<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    
    public function index()
    {
        return response()->json(Review::all());
    }

    
    public function show($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review não encontrada'], 404);
        }
        return response()->json($review);
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'nota' => 'required|integer|min:0|max:5',
            'comentario' => 'required|string',
            'livro_id' => 'required|exists:livros,id',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $review = Review::create($request->all());
        return response()->json($review, 201);
    }

    
    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review não encontrada'], 404);
        }

        $request->validate([
            'nota' => 'integer|min:0|max:5',
            'comentario' => 'string',
        ]);

        $review->update($request->all());
        return response()->json($review);
    }

    
    public function destroy($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review não encontrada'], 404);
        }

        $review->delete();
        return response()->json(['message' => 'Review deletada com sucesso']);
    }
}
