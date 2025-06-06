<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGeneroRequest;
use App\Http\Requests\UpdateGeneroRequest;
use App\Http\Resources\GeneroResource;
use App\Http\Resources\LivroResource;
use App\Services\GeneroService;

class GeneroController extends Controller
{
    protected $service;

    public function __construct(GeneroService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return GeneroResource::collection($this->service->listarComLivros());
    }

    public function store(StoreGeneroRequest $request)
    {
        return new GeneroResource($this->service->criar($request->validated()));
    }

    public function show($id)
    {
        return new GeneroResource($this->service->buscarComLivros($id));
    }

    public function update(UpdateGeneroRequest $request, $id)
    {
        return new GeneroResource($this->service->atualizar($id, $request->validated()));
    }

    public function destroy($id)
    {
        $this->service->deletar($id);
        return response()->json(null, 204);
    }

    public function listarLivros($generoId)
    {
        return LivroResource::collection($this->service->listarLivros($generoId));
    }

    public function listarGenerosComLivros()
    {
        return GeneroResource::collection($this->service->listarComLivros());
    }
}
