<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    protected $service;

    public function __construct(ReviewService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return ReviewResource::collection($this->service->listarComRelacionamentos());
    }

    public function store(StoreReviewRequest $request)
    {
        return new ReviewResource($this->service->criar($request->validated()));
    }

    public function show($id)
    {
        return new ReviewResource($this->service->buscarComRelacionamentos($id));
    }

    public function update(UpdateReviewRequest $request, $id)
    {
        return new ReviewResource($this->service->atualizar($id, $request->validated()));
    }

    public function destroy($id)
    {
        $this->service->deletar($id);
        return response()->json(null, 204);
    }
}
