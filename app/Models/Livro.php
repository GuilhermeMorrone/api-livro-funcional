<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livro';

    protected $fillable = ['titulo', 'sinopse', 'autor_id', 'genero_id'];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class)->withDefault();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
