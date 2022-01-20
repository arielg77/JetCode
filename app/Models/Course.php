<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Este modelo representa a los cursos que se publican en la
 * plataforma.
 */
class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews'];

    //Estados que puede tener un curso
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    /**
     * Este atributo obtiene el promedio de calificaciones
     * que un usuario le da a un curso.
     */
    public function getRatingAttribute()
    {
        return $this->reviews_count
                                    ? round($this->reviews->avg('rating'), 1)
                                    : 5;

    }

    /**
     * Obtiene el instructor que dicta el curso.
     *
     * Relación uno a muchos inversa con el modelo User.
     * Muchos cursos pueden ser dictados por el mismo instructor.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtiene los estudiantes que se han matriculado al curso.
     *
     * Relación muchos a muchos con el modelo User.
     */
    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Obtiene las reseñas del curso.
     *
     * Relación uno a muchos con el modelo Review.
     * Un curso puede tener muchas reseñas.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Obtiene el nivel del curso.
     *
     * Relación uno a muchos inversa con el modelo Level.
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * Obtiene la categoría del curso.
     *
     * Relación uno a muchos inversa con el modelo Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Obtiene el precio del curso.
     *
     * Relación uno a muchos inversa con el modelo Price.
     */
    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    /**
     * Obtiene los requerimientos del curso.
     *
     * Relación uno a muchos con el modelo Requirement.
     * Un curso puede tener muchos requerimientos.
     */
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    /**
     * Obtiene los objetivos del curso.
     *
     * Relación uno a muchos con el modelo Goal.
     * Un curso puede tener muchos objetivos.
     */
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    /**
     * Obtiene las audiencias del curso.
     *
     * Relación uno a muchos con el modelo Audience.
     * Un curso puede tener muchas audiencias.
     */
    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    /**
     * Obtiene las secciones del curso.
     *
     * Relación uno a muchos con el modelo Section.
     * Un curso puede tener muchas secciones.
     */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    /**
     * Obtiene la imagen que un instructor le asigna a un curso.
     *
     * Relación uno a uno polimórfica.
     * Un curso puede tener sólo una imagen.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Obtiene las lecciones que pertenecen al curso.
     *
     * Relación uno a muchos.
     * Un curso puede tener muchas lecciones.
     */
    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Section::class);
    }
}
