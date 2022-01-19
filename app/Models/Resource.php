<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa los recursos que un instructor
 * asigna a una lección.
 * Por ejemplo: Un artículo de un blog, código fuente, etc.
 */
class Resource extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene el modelo padre resourceable.
     */
    public function resourceable()
    {
        return $this->morphTo();
    }
}
