<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllCourse extends Model
{
    /** @use HasFactory<\Database\Factories\AllCourseFactory> */
    use HasFactory;

    protected $fillable = [
        "level",
        "course_code",
        "course_name",
    ] ;


}
