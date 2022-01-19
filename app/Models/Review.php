<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa las reseñas que un curso puede
 * tener.
 */
class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene el usuario al cuál pertenece la reseña
     *
     * Relación uno a muchos inversa con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtiene el curso al que pertenece la reseña.
     *
     * Relación uno a muchos inversa con el modelo Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
