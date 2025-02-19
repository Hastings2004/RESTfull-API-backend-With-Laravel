<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Framework\Attributes\Before;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        "user_id",
        "student_id",
        "level",
        "course_code",
        "course_name",
    ] ;

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
