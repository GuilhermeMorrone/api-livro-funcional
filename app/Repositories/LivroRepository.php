<?php
namespace App\Repositories;

use App\Models\Autor;

class AutorRepository
{
    public function all()               { return Autor::with('livro')->get(); }
    public function find($id)          { return Autor::with('livro')->findOrFail($id); }
    public function create($data)      { return Autor::create($data); }
    public function update($id, $d)    { $a = Autor::findOrFail($id); $a->update($d); return $a; }
    public function delete($id)        { return Autor::findOrFail($id)->delete(); }
    public function livro($id)        { return Autor::findOrFail($id)->livro; }
}
