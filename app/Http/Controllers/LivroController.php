<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Http\Resources\LivroResource;
use App\Http\Resources\ReviewResource;
use App\Services\LivroService;

class LivroController extends Controller
{
    protected $service;

    public function __construct(LivroService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return LivroResource::collection($this->service->listarComAutorGenero());
    }

    public function store(StoreLivroRequest $request)
    {
        return new LivroResource($this->service->criar($request->validated()));
    }

    public function show($id)
    {
        return new LivroResource($this->service->buscarComTudo($id));
    }

    public function update(UpdateLivroRequest $request, $id)
    {
        return new LivroResource($this->service->atualizar($id, $request->validated()));
    }

    public function destroy($id)
    {
        $this->service->deletar($id);
        return response()->json(null, 204);
    }

    public function listarReviews($livroId)
    {
        return ReviewResource::collection($this->service->listarReviews($livroId));
    }

    public function listarCompletos()
    {
        return LivroResource::collection($this->service->listarComTudo());
    }
}
