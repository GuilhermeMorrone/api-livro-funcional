<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Http\Resources\AutorResource;
use App\Http\Resources\LivroResource;
use App\Services\AutorService;

class AutorController extends Controller
{
    protected $service;

    public function __construct(AutorService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return AutorResource::collection($this->service->listarComLivros());
    }

    public function store(StoreAutorRequest $request)
    {
        return new AutorResource($this->service->criar($request->validated()));
    }

    public function show($id)
    {
        return new AutorResource($this->service->buscarComLivros($id));
    }

    public function update(UpdateAutorRequest $request, $id)
    {
        return new AutorResource($this->service->atualizar($id, $request->validated()));
    }

    public function destroy($id)
    {
        $this->service->deletar($id);
        return response()->json(null, 204);
    }

    public function listarLivros($autorId)
    {
        return LivroResource::collection($this->service->listarLivros($autorId));
    }

    public function listarAutoresComLivros()
    {
        return AutorResource::collection($this->service->listarComLivros());
    }
}
