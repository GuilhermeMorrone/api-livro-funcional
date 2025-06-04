<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'genero_id' => 'required|exists:generos,id',
            'sinopse' => 'required|string',
        ];
    }
}

