<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'sometimes|required|string|max:255',
            'sinopse' => 'nullable|string',
            'autor_id' => 'sometimes|required|exists:autor,id',
            'genero_id' => 'sometimes|required|exists:genero,id',
        ];
    }
}

