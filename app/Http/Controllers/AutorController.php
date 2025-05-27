<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Http\Resources\AutorResource;
use App\Http\Resources\LivroResource;

class AutorController extends Controller
{
    public function listarAutoresComLivros()
    {
        $autores = Autor::with('livros')->get();
        return AutorResource::collection($autores);
    }

    public function listarLivros($id)
    {
        $autor = Autor::findOrFail($id);
        $livros = $autor->livros;
        return LivroResource::collection($livros);
    }

    public function deletar($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return response()->json(null, 204);
    }

    public function destroy($id)
{
    $autor = Autor::findOrFail($id);

    foreach ($autor->livros as $livro) {
        $livro->reviews()->delete(); 
        $livro->delete();
    }

    $autor->delete();

    return response()->json(null, 204);
}

}
