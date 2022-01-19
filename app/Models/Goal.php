<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa los objetivos de un curso.
 */
class Goal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Otiene el curso al que pertenece el objetivo.
     *
     * Relación uno a mucho inversa con el modelo Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
