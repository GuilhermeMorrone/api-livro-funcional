<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = ['nota', 'texto'];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuario_review', 'review_id', 'usuario_id');
    }

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_review', 'review_id', 'livro_id');
    }
}
