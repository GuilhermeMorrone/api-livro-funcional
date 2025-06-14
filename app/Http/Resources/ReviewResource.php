<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nota' => $this->nota,
            'usuario' => new UsuarioResource($this->whenLoaded('usuario')),
             'texto' => $this->texto,
        ];
    }
}
