<?php

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    public function listarTodos()
    {
        return Review::with(['usuario', 'livro'])->get();
    }

    public function buscarPorId($id)
    {
        return Review::with(['usuario', 'livro'])->findOrFail($id);
    }

    public function criar(array $dados)
    {
        return Review::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $review = Review::findOrFail($id);
        $review->update($dados);
        return $review;
    }

    public function deletar($id)
    {
        $review = Review::findOrFail($id);
        return $review->delete();
    }
    public function listarComRelacionamentos()
    {
        return Review::with(['usuario', 'livro'])->get();
    }

    public function buscarComRelacionamentos($id)
    {
        return Review::with(['usuario', 'livro'])->findOrFail($id);
    }   

}