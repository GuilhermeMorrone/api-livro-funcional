<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Resources\UsuarioResource;
use App\Http\Resources\ReviewResource;

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
        $usuario = Usuario::create($request->all());
        return new UsuarioResource($usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return new UsuarioResource($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(null, 204);
    }
}
