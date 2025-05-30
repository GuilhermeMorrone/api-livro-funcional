<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'generos';

    protected $fillable = ['nome'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'genero_livro', 'genero_id', 'livro_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($genero) {
            $genero->livros()->detach();
        });
    }
}
