<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa la descripción de una lección.
 */
class Description extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene la lección que pertenece a la descripción.
     *
     * Relación uno a uno inversa con el modelo Lesson.
     */
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
