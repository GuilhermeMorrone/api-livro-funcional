<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = ['livro_id', 'usuario_id', 'comentario', 'nota'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($review) {
            if ($review->nota < 0 || $review->nota > 5) {
                throw new \Exception("A nota da review deve ser entre 0 e 5.");
            }
        });
    }
}
