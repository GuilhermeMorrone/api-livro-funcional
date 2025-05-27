<?php

namespace App\Repositories;

use App\Models\Genero;

class GeneroRepository
{
    public function all()
    {
        return Genero::all();
    }

    public function find($id)
    {
        return Genero::find($id);
    }

    public function create(array $data)
    {
        return Genero::create($data);
    }

    public function update($id, array $data)
    {
        $genero = $this->find($id);
        if ($genero) {
            $genero->update($data);
            return $genero;
        }
        return null;
    }

    public function delete($id)
    {
        $genero = $this->find($id);
        if ($genero) {
            return $genero->delete();
        }
        return false;
    }

    public function withLivros()
    {
        return Genero::with('livros')->get();
    }
}
