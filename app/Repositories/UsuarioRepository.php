<?php

namespace App\Repositories;

use App\Models\Usuario;

class UsuarioRepository
{
    public function all()
    {
        return Usuario::all();
    }

    public function find($id)
    {
        return Usuario::find($id);
    }

    public function create(array $data)
    {
        return Usuario::create($data);
    }

    public function update($id, array $data)
    {
        $usuario = $this->find($id);
        if ($usuario) {
            $usuario->update($data);
            return $usuario;
        }
        return null;
    }

    public function delete($id)
    {
        $usuario = $this->find($id);
        if ($usuario) {
            return $usuario->delete();
        }
        return false;
    }

    public function withReviews()
    {
        return Usuario::with('reviews')->get();
    }
}
