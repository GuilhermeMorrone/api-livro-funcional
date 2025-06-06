<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';

    protected $fillable = ['nome', 'email', 'senha'];

    protected $hidden = ['senha'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
