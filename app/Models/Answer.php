<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "student_answers";

    protected $fillable = ['question_id','student_id'];

    protected $guarded = ['id'];

    protected $hidden = [
        'question_id','student_id',
    ];

    public function choice(){
        return $this->hasOne('Studihub\Models\Choice');
    }

    public function student(){
        return $this->belongsTo('Studihub\Models\Student','student_id','id');
    }

    public function question(){
        return $this->belongsTo('Studihub\Models\Question','question_id','id');
    }
}
