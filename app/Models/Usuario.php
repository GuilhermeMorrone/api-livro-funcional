<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];

    // Relacionamento com reviews (através da tabela pivô usuario_review)
    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'usuario_review', 'usuario_id', 'review_id');
    }
}
