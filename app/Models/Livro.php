<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $fillable = ['titulo', 'sinopse'];

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autor', 'livro_id', 'autor_id');
    }

    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'genero_livro', 'livro_id', 'genero_id');
    }

    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'livro_review', 'livro_id', 'review_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($livro) {
            $livro->reviews()->delete();
        });
    }

}

