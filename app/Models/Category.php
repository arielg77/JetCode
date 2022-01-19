<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa las distintas categorías de cursos.
 * Por ejemplo: 'Desarrollo Web', 'Desarrollo Móvil', etc.
 */
class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene los cursos que pertenecen a la categoría.
     *
     * Relación uno a muchos con el modelo Course.
     * Una categoría puede tener muchos cursos.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
