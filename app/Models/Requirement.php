<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa los requerimientos de un curso.
 */
class Requirement extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Otiene el curso al que pertenece el requerimiento
     *
     * Relación uno a mucho inversa con el modelo Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}
