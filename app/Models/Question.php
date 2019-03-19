<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "question_banks";

    protected $fillable = [
        'topic_id','views',
        'question_difficulty',
        'question_desc',
        'hidden','exam_type',
        'question_desc','published_at'
    ];

    protected $guarded = ['id'];


    public function answers(){
        return $this->hasMany('Studihub\Models\Answer');
    }

    public function choices(){
        return $this->hasMany('Studihub\Models\Choice','question_id','id');
    }

    public function topic(){
        return $this->belongsTo('Studihub\Models\Topic','topic_id','id');
    }
}
