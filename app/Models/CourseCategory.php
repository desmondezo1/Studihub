<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{

    protected $table = "course_category";

    protected $fillable = ['category','exam_type'];

    protected $guarded = ['id'];


    public function courses(){
        return $this->hasMany("Studihub\Models\Course");
    }
}
