<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nota' => 'required|integer|min:0|max:5',
            'texto' => 'nullable|string',
            'usuario_id' => 'required|exists:usuario,id',
            'livro_id' => 'required|exists:livro,id',
        ];
    }
}

