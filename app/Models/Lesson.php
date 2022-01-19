<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa las lecciones que hay en una sección.
 */
class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene la sección a la que pertenece la lección.
     *
     * Relación uno a muchos inversa con el modelo Section.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Obtiene la plataforma a la que pertenece la lección.
     *
     * Relación uno a muchos inversa con el modelo Platform.
     */
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    /**
     * Obtiene la descripción de la lección.
     *
     * Relación uno a uno con el modelo Description.
     * Una lección solo puede tener una descripción.
     */
    public function description ()
    {
        return $this->hasOne(Description::class);
    }

    /**
     * Obtiene los usuarios que completaron la lección.
     *
     * Relación muchos a muchos con el modelo User.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Obtiene el recurso de la lección.
     *
     * Relación uno a uno polimórfica con el modelo Resource.
     * Una lección solo puede tener un recurso.
     */
    public function resource()
    {
        return $this->morphOne(Resourse::class, 'resourceable');
    }

    /**
     * Obtiene los comentarios que los usuarios hacen a
     * la lección.
     *
     * Relación uno a muchos polimórfica con el modelo Comment.
     * Una lección puede tener muchos comentarios.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Obtiene las reacciones de los usuarios a la lección.
     *
     * Relación uno a muchos polimórfica.
     * Una lección puede tener muchas reacciones.
     */
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
