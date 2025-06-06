<?php

namespace App\Services;

use App\Models\Autor;

class AutorService
{
    public function listarTodos()
    {
        return Autor::with('livro')->get();
    }

    public function listarComLivros()
    {
        return Autor::with('livro')->get();
    }

    public function buscarPorId($id)
    {
        return Autor::findOrFail($id);
    }

    public function buscarComLivros($id)
    {
        return Autor::with('livro')->findOrFail($id);
    }

    public function criar(array $dados)
    {
        return Autor::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($dados);
        return $autor;
    }

    public function deletar($id)
    {
        $autor = Autor::findOrFail($id);
        return $autor->delete();
    }

    public function listarLivros($autorId)
    {
        $autor = Autor::with('livro')->findOrFail($autorId);
        return $autor->livro;
    }
}
