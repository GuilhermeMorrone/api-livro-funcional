<?php

namespace App\Services;

use App\Models\Usuario;

class UsuarioService
{
    public function listarTodos()
    {
        return Usuario::with('reviews')->get();
    }

    public function buscarPorId($id)
    {
        return Usuario::with('reviews')->find($id);
    }

    public function criar(array $dados)
    {
        return Usuario::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $usuario = $this->buscarPorId($id);
        if ($usuario) {
            $usuario->update($dados);
            return $usuario;
        }
        return null;
    }

    public function deletar($id)
    {
        $usuario = $this->buscarPorId($id);
        if ($usuario) {
            // Apaga reviews do usuário
            $usuario->reviews()->delete();
            $usuario->delete();
            return true;
        }
        return false;
    }
}
