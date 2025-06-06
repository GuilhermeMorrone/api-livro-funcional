<?php
namespace App\Repositories;

use App\Models\Usuario;

class UsuarioRepository
{
    public function all()               { return Usuario::all(); }
    public function find($id)          { return Usuario::findOrFail($id); }
    public function create(array $d)   { return Usuario::create($d); }
    public function update($id, $d)    { $u = Usuario::findOrFail($id); $u->update($d); return $u; }
    public function delete($id)        { return Usuario::findOrFail($id)->delete(); }
    public function reviews($id)       { return Usuario::findOrFail($id)->reviews()->with('livro')->get(); }
}
