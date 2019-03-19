<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTutor extends Model
{
    protected $table = "course_tutors";

    protected $fillable = ['tutor_id','topic_id'];

    protected $guarded = ['id'];


    public function topics(){
        return $this->hasMany("Studihub\Models\Topic");
    }
}
