<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Resources\UsuarioResource;
use App\Http\Resources\ReviewResource;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    protected $service;

    public function __construct(UsuarioService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return UsuarioResource::collection($this->service->listar());
    }

    public function store(StoreUsuarioRequest $request)
    {
        return new UsuarioResource($this->service->criar($request->validated()));
    }

    public function show($id)
    {
        return new UsuarioResource($this->service->buscar($id));
    }

    public function update(UpdateUsuarioRequest $request, $id)
    {
        return new UsuarioResource($this->service->atualizar($id, $request->validated()));
    }

    public function destroy($id)
    {
        $this->service->deletar($id);
        return response()->json(null, 204);
    }

    public function listarReviews($usuarioId)
    {
        return ReviewResource::collection($this->service->listarReviews($usuarioId));
    }
}
