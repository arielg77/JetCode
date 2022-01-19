<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa a los comentarios que los usuarios
 * realizan dentro de la plataforma.
 */
class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene el modelo padre commentable.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Obtiene los comentarios que se le han hecho a un comentario
     * específico.
     *
     * Relación uno a muchos polimórfica.
     * Un comentario puede tener muchos comentarios.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Obtiene las reacciones que un usuario realiza a un
     * comentario.
     *
     * Relación uno a muchos polimórfica.
     * Un comentario puede tener muchas reacciones.
     */
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }

    /**
     * Obtiene el usuario que realizó el comentario.
     *
     * Relación uno a muchos inversa con el modelo User.
     * Muchos comentarios pueden pertenecer a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
