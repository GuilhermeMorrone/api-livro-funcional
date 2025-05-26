<?php

namespace App\Services;

use App\Models\Autor;

class AutorService
{
    public function listarTodos()
    {
        return Autor::with('livros')->get();
    }

    public function buscarPorId($id)
    {
        return Autor::with('livros')->find($id);
    }

    public function criar(array $dados)
    {
        return Autor::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $autor = $this->buscarPorId($id);
        if ($autor) {
            $autor->update($dados);
            return $autor;
        }
        return null;
    }

    public function deletar($id)
    {
        $autor = $this->buscarPorId($id);
        if ($autor) {
            // Apaga todos os livros do autor (que apagarão as reviews via cascade)
            foreach ($autor->livros as $livro) {
                $livro->reviews()->delete();
                $livro->delete();
            }
            $autor->delete();
            return true;
        }
        return false;
    }
}
