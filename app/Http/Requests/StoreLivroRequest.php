<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'sinopse' => 'nullable|string',
            'autor_id' => 'required|exists:autor,id',
            'genero_id' => 'required|exists:genero,id',
        ];
    }
}
