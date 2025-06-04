<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Resources\UsuarioResource;
use App\Http\Resources\ReviewResource;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return UsuarioResource::collection($usuarios);
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return new UsuarioResource($usuario);
    }

    public function listarReviews($id)
    {
        $usuario = Usuario::findOrFail($id);
        $reviews = $usuario->reviews;
        return ReviewResource::collection($reviews);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6',
        ]);

        $validated['senha'] = Hash::make($validated['senha']);
        $usuario = Usuario::create($validated);

        return new UsuarioResource($usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:usuarios,email,' . $id,
            'senha' => 'sometimes|required|string|min:6',
        ]);

        if (isset($validated['senha'])) {
            $validated['senha'] = Hash::make($validated['senha']);
        }

        $usuario->update($validated);

        return new UsuarioResource($usuario);
    }

    public function deletar($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(null, 204);
    }
}
