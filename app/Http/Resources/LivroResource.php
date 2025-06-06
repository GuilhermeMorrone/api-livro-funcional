<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'genero' => new GeneroResource($this->whenLoaded('genero')),
            'autor' => new AutorResource($this->whenLoaded('autor')),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
            'sinopse' => $this->sinopse,
        ];
    }
}
