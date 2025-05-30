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


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($usuario) {
            $usuario->reviews()->delete();
        });
    }
}
