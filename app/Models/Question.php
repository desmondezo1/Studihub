<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "question_banks";

    protected $fillable = [
        'topic_id','views','course_id',
        'question_difficulty',
        'question_choice_id',
        'question_desc'
    ];

    protected $guarded = ['id'];


    public function answers(){
        return $this->hasMany('Studihub\Models\Topic');
    }
}
