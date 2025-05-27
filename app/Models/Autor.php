<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores';

    protected $fillable = ['nome', 'data_nascimento', 'biografia'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_autor', 'autor_id', 'livro_id');
    }

    public static function boot()
{
    parent::boot();

    static::deleting(function ($autor) {
        $autor->livros()->delete();
    });
}

}
