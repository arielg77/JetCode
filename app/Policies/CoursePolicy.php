<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Verifica si el usuario está matriculado a un curso.
     *
     * @param \App\Models\User $user Usuario autenticado
     * @param \App\Models\Course $course Curso a verificar
     *
     * @return true|false
     */
    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user->id);
    }

    public function published(?User $user, Course $course)
    {
        if ($course->status == 3) {
            return true;
        } else {
            return false;
        }
    }
}
