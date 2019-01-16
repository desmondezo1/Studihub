<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "student_answers";

    protected $fillable = ['question_id'];

    protected $guarded = ['id'];

    public function choice(){
        return $this->hasOne('Studihub\Models\Choice');
    }
}
