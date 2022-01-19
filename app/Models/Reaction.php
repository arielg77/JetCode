<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa a las reacciones de los usuarios
 * a instructores o a comentarios.
 */
class Reaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const LIKE = 1;
    const DISLIKE = 2;

    /**
     * Obtiene el modelo padre reactionable.
     */
    public function reactionable()
    {
        return $this->morphTo();
    }

    /**
     * Obtiene el usuario que realizó la reacción.
     *
     * Relación uno a muchos inversa con el modelo User.
     * Muchas reacciones pueden pertenecer a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
