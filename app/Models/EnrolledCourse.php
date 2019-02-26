<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class EnrolledCourse extends Model
{
    protected $table = "enrolled_courses";

    protected $fillable = ['course_id',
        'student_id',
        'date_enrolled',
        'expired_at',
        'date_completed',
        'progress_level'
    ];

    protected $guarded = [
        'id',
        'student_id',
        'date_enrolled',
        'expired_at',
        'date_completed',
        'progress_level'
    ];
}
