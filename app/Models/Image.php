<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa las imágenes que el instructor
 * asigna a un curso u otras secciones de la plataforma.
 */
class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene el modelo padre imageable.
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
