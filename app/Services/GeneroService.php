<?php

namespace App\Services;

use App\Models\Genero;

class GeneroService
{
    public function listarTodos()
    {
        return Genero::with('livro')->get();
    }

    public function listarComLivros()
    {
        return Genero::with('livro')->get();
    }

    public function buscarPorId($id)
    {
        return Genero::with('livro')->findOrFail($id);
    }

    public function criar(array $dados)
    {
        return Genero::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $genero = Genero::findOrFail($id);
        $genero->update($dados);
        return $genero;
    }

    public function deletar($id)
    {
        $genero = Genero::findOrFail($id);
        return $genero->delete();
    }

    public function listarLivros($generoId)
    {
        $genero = Genero::with('livro')->findOrFail($generoId);
        return $genero->livro;
    }
    public function buscarComLivros($id)
    {
        return Genero::with('livro')->findOrFail($id);
    }

}
