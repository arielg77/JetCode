<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa las secciones que componen un curso.
 */
class Section extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Otiene el curso al que pertenece la sección.
     *
     * Relación uno a mucho inversa con el modelo Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Obtiene las lecciones de la sección.
     *
     * Relación uno a muchos con el modelo Lesson.
     * Una sección puede tener muchas lecciones.
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }


}
