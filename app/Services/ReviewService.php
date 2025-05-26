<?php

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    public function listarTodos()
    {
        return Review::with(['livro', 'usuario'])->get();
    }

    public function buscarPorId($id)
    {
        return Review::find($id);
    }

    public function criar(array $dados)
    {
        if (isset($dados['nota']) && ($dados['nota'] < 0 || $dados['nota'] > 5)) {
            throw new \InvalidArgumentException("Nota deve ser entre 0 e 5.");
        }
        return Review::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $review = $this->buscarPorId($id);
        if ($review) {
            if (isset($dados['nota']) && ($dados['nota'] < 0 || $dados['nota'] > 5)) {
                throw new \InvalidArgumentException("Nota deve ser entre 0 e 5.");
            }
            $review->update($dados);
            return $review;
        }
        return null;
    }

    public function deletar($id)
    {
        $review = $this->buscarPorId($id);
        if ($review) {
            $review->delete();
            return true;
        }
        return false;
    }
}
