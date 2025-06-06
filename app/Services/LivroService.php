<?php

namespace App\Services;

use App\Models\Livro;

class LivroService
{
    public function listarTodos()
    {
        return Livro::with(['autor', 'genero'])->get();
    }

    public function listarCompletos()
    {
        return Livro::with(['autor', 'genero', 'reviews.usuario'])->get();
    }

    public function buscarPorId($id)
    {
        return Livro::with(['autor', 'genero', 'reviews.usuario'])->findOrFail($id);
    }

    public function criar(array $dados)
    {
        return Livro::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $livro = Livro::findOrFail($id);
        $livro->update($dados);
        return $livro;
    }

    public function deletar($id)
    {
        $livro = Livro::findOrFail($id);
        return $livro->delete();
    }

    public function listarReviews($livroId)
    {
        return Livro::findOrFail($livroId)->reviews()->with('usuario')->get();
    }
    public function listarComAutorGenero()
    {
        return Livro::with(['autor', 'genero'])->get();
    }

    public function buscarComTudo($id)
    {
        return Livro::with(['autor', 'genero', 'reviews.usuario'])->findOrFail($id);
    }

    public function listarComTudo()
    {
        return Livro::with(['autor', 'genero', 'reviews.usuario'])->get();
    }

}
