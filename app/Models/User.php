<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * Este modelo representa a los usuarios de la plataforma.
 * Los mismos pueden ser estudiantes o instructores.
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Obtiene el Perfil del usuario.
     *
     * Relación uno a uno con el modelo Profile.
     * Un usuario puede tener un único perfil.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Obtiene los cursos que pertenecen al usuario cuando
     * dicho usuario es un instructor.
     *
     * Relación uno a muchos con el modelo Course.
     * Un usuario puede dictar muchos cursos.
     */
    public function courses_dictated()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Obtiene los cursos a los que un usuario se ha
     * matriculado en el caso de que el usuario sea un
     * estudiante.
     *
     * Relación muchos a muchos con el modelo Course.
     * Un usuario puede matricularse a muchos cursos.
     */
    public function courses_enrolled()
    {
        return $this->BelongsToMany(Course::class);
    }

    /**
     * Obtiene las reseñas del usuario.
     *
     * Relación uno a muchos con el modelo Review.
     * Un usuario puede tener muchas reseñas.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Obtiene las lecciones que completó el usuario.
     *
     * Relación muchos a muchos con el modelo Lesson.
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    /**
     * Obtiene los comentarios que realizó un usuario.
     *
     * Relación uno a muchos con el modelo Comment.
     * Un usuario puede tener muchos comentarios.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Obtiene las reacciones que realizó un usuario.
     *
     * Relación uno a muchos con el modelo Reaction.
     * Un usuario puede tener muchas reacciones.
     */
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
}
