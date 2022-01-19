<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa los distintos precios que puede
 * tener un curso. Estos precios ya están pre-establecidos
 * en la aplicación, por lo tanto el creador del curso debe
 * seleccionar uno de los precios establecidos para su curso.
 */
class Price extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene los cursos que pertenecen al precio dado.
     *
     * Relación uno a muchos con el modelo Course.
     * Un precio puede tener muchos cursos.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
