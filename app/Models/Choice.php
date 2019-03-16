<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = "question_choices";

    protected $fillable = ['question_id','choice_desc','choice_option','is_correct'];

    protected $guarded = ['id'];

    protected $hidden = [
        'question_id','choice_desc','choice_option','is_correct'
    ];

    public function question(){
        return $this->belongsTo('Studihub\Models\Question','question_id','id');
    }
}
