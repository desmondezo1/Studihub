<?php

namespace Studihub\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tutor extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'tutors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email', 'password','bio','qualification','verification_code',
        'gender',
        'dob',
        'address',
        'state',
        'city',
        'school',
        'course',
        'degree',
        'company',
        'experience',
        'role',
        'stillworkthere',
        'classname',
        'curriculum',
        'social_media',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','verification_code','username', 'email',
    ];
}
