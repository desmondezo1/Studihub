<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = "question_choices";

    protected $fillable = ['question_id'];

    protected $guarded = ['id'];

    public function questions(){
        return $this->belongsTo('Studihub\Models\Question');
    }
}
