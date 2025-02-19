<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    public function modify(User $user, Course $course){
        return $user->id === $course->user_id;

    }
}
