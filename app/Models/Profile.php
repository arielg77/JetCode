<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa al perfil del usuario con información
 * extra sobre el mismo.
 */
class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Obtiene el Usuario al cuál pertenece el Perfil.
     *
     * Relación inversa uno a uno con el modelo User.
     * Un perfil puede pertenecer a un solo usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
