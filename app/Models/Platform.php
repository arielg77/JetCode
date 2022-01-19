<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa la plataforma a la que pertenece una lección.
 */
class Platform extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene las lecciones que pertenecen a una plataforma.
     *
     * Relación uno a muchos con el modelo Lesson.
     * Una plataforma puede tener muchas lecciones.
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
