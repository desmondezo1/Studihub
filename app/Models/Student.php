<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Student extends Authenticatable
{
    use Notifiable;

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullnameAttribute($options){
        return $this->firstname .' ' .$this->lastname;
    }

    public function isTopicBought($slug){
        $topic = Topic::findBySlugOrFail($slug)->first();
        $paid = DB::table("user_paid_topics")->where('topic_id', $topic->id)->where("student_id", $this->id)->exists();
        return $paid;
    }
}
