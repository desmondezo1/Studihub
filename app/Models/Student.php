<?php

namespace Studihub\Models;

use Carbon\Carbon;
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
        'password', 'remember_token','expired_at', 'date_paid','username', 'email',
    ];

    public function getFullnameAttribute($options){
        return $this->firstname .' ' .$this->lastname;
    }

    public function isTopicBought($value){
        $topic = Topic::findBySlugOrFail($value)->first();
        $paid = DB::table("user_paid_topics")->where([['topic_id', $topic->id],["student_id", $this->id],["expired_at",'>=', Carbon::now()]])->exists();
        return $paid;
    }

    public function isCourseSubscribed($value){
        $topic = Topic::findBySlugOrFail($value)->with('courses')->first();
        $paid_courses = DB::table("enrolled_courses")->where([['course_id', $topic->course_id],["student_id", $this->id],["expired_at",'>=', Carbon::now()]])->exists();
        return $paid_courses;
    }
}
