<?php

namespace App\Services;

use App\Models\Genero;

class GeneroService
{
    public function listarTodos()
    {
        return Genero::with('livros')->get();
    }

    public function buscarPorId($id)
    {
        return Genero::with('livros')->find($id);
    }

    public function criar(array $dados)
    {
        return Genero::create($dados);
    }

    public function atualizar($id, array $dados)
    {
        $genero = $this->buscarPorId($id);
        if ($genero) {
            $genero->update($dados);
            return $genero;
        }
        return null;
    }

    public function deletar($id)
    {
        $genero = $this->buscarPorId($id);
        if ($genero) {
            // Desvincula livros (seta o genero_id como null)
            foreach ($genero->livros as $livro) {
                $livro->genero_id = null;
                $livro->save();
            }
            $genero->delete();
            return true;
        }
        return false;
    }
}
