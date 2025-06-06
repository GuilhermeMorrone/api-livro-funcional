<?php 
namespace App\Repositories;

use App\Models\Genero;

class GeneroRepository
{
    public function all()               { return Genero::with('livro')->get(); }
    public function find($id)          { return Genero::with('livro')->findOrFail($id); }
    public function create($data)      { return Genero::create($data); }
    public function update($id, $d)    { $g = Genero::findOrFail($id); $g->update($d); return $g; }
    public function delete($id)        { return Genero::findOrFail($id)->delete(); }
    public function livro($id)        { return Genero::findOrFail($id)->livro; }
}
