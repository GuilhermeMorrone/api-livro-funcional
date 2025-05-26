<?php

namespace App\Services;

use App\Models\Livro;

class LivroService
{
    public function listarTodos()
    {
        return Livro::with(['reviews', 'autor', 'genero'])->get();
    }

    public function buscarPorId($id)
    {
        return Livro::with(['reviews', 'autor', 'genero'])->find($id);
    }

    public function criar(array $dados)
    {
        return Livro::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $livro = $this->buscarPorId($id);
        if ($livro) {
            $livro->update($dados);
            return $livro;
        }
        return null;
    }

    public function deletar($id)
    {
        $livro = $this->buscarPorId($id);
        if ($livro) {
            // Apaga reviews relacionadas
            $livro->reviews()->delete();
            // Apaga o livro
            $livro->delete();
            return true;
        }
        return false;
    }
}
