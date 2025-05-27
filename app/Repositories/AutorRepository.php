<?php

namespace App\Repositories;

use App\Models\Autor;

class AutorRepository
{
    public function all()
    {
        return Autor::all();
    }

    public function find($id)
    {
        return Autor::find($id);
    }

    public function create(array $data)
    {
        return Autor::create($data);
    }

    public function update($id, array $data)
    {
        $autor = $this->find($id);
        if ($autor) {
            $autor->update($data);
            return $autor;
        }
        return null;
    }

    public function delete($id)
    {
        $autor = $this->find($id);
        if ($autor) {
            return $autor->delete();
        }
        return false;
    }

    public function withLivros()
    {
        return Autor::with('livros')->get();
    }
}
