<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nota' => 'sometimes|required|integer|min:0|max:5',
            'texto' => 'nullable|string',
            'usuario_id' => 'sometimes|required|exists:usuario,id',
            'livro_id' => 'sometimes|required|exists:livros,id',
        ];
    }
}
