<?php

namespace App\Services;

use App\Models\Usuario;

class UsuarioService
{
    public function listarTodos()
    {
        return Usuario::all();
    }

    public function buscarPorId($id)
    {
        return Usuario::findOrFail($id);
    }

    public function criar(array $dados)
    {
        return Usuario::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($dados);
        return $usuario;
    }

    public function deletar($id)
    {
        $usuario = Usuario::findOrFail($id);
        return $usuario->delete();
    }

    public function listarReviews($usuarioId)
    {
        return Usuario::findOrFail($usuarioId)->review()->with('livro')->get();
    }
    public function listar()
    {
        return Usuario::all();
    }

    public function buscar($id)
    {
        return Usuario::findOrFail($id);
    }

}
