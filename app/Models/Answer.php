<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "question_answers";

    protected $fillable = ['question_id'];

    protected $guarded = ['id'];
}
