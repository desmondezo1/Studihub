<?php

namespace Studihub\Models;

use Carbon\Carbon;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Student extends Authenticatable implements BannableContract
{
    use Notifiable,Bannable;

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','username', 'email', 'password','gender','avatar','phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','expired_at', 'date_paid','username', 'email',
    ];

    public function shouldApplyBannedAtScope()
    {
        return true;
    }

    public function getPhotoAttribute($options){
        if($this->avatar != ''){
            return asset('storage/uploads/student/photos/'.$this->avatar);
        }
        return '/img/dashboard/avatar/'.$this->gender.'_avatar.png';
    }


    public function getFullnameAttribute($options){
        return $this->firstname .' ' .$this->lastname;
    }

    public function isCourseSubscribed($value){
        $topic = Topic::findBySlugOrFail($value)->with('course')->first();
        $paid_courses = DB::table("enrolled_courses")->where([['course_id', $topic->course_id],["student_id", $this->id],["expired_at",'>=', Carbon::now()]])->exists();
        return $paid_courses;
    }
}
