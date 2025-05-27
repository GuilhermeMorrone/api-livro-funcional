<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nota' => $this->nota,
            'comentario' => $this->comentario,
            'livro_id' => $this->livro_id,
            'usuario' => new UsuarioResource($this->usuario),
            'created_at' => $this->created_at,
        ];
    }
}
