<?php

namespace App\Repositories;

use App\Models\Livro;

class LivroRepository
{
    public function all()
    {
        return Livro::all();
    }

    public function find($id)
    {
        return Livro::find($id);
    }

    public function create(array $data)
    {
        return Livro::create($data);
    }

    public function update($id, array $data)
    {
        $livro = $this->find($id);
        if ($livro) {
            $livro->update($data);
            return $livro;
        }
        return null;
    }

    public function delete($id)
    {
        $livro = $this->find($id);
        if ($livro) {
            return $livro->delete();
        }
        return false;
    }

    public function withRelations()
    {
        return Livro::with(['reviews', 'autor', 'genero'])->get();
    }
}
