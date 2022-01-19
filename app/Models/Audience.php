<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa las audiencias de un curso.
 */
class Audience extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Otiene el curso al que pertenece la audiencia.
     *
     * Relación uno a mucho inversa con el modelo Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
