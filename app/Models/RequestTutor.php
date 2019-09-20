<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class RequestTutor extends Model
{
    protected $table = "request_tutors";

    protected $fillable = [
        'firstname', 'lastname',
        'email','phone','gender',
        'state','address','read'
    ];

    protected $guarded = ['id'];

    protected $hidden = [
        'firstname', 'lastname',
        'email','phone','gender',
        'state','address'
    ];


}
