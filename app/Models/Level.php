<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa los distintos niveles que puede
 * tener un curso.
 * Por ejemplo: 'Básico', 'Intermedio', 'Avanzado'
 */
class Level extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene los cursos que pertenecen al nivel dado.
     *
     * Relación uno a muchos con el modelo Course.
     * Un nivel puede tener muchos cursos.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
