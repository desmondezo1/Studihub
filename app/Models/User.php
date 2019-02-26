<?php

namespace Studihub\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable ,EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'avatar', 'password','phone','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email'
    ];

    public function getPhotoAttribute($options){
        if($this->avatar != ''){
            return asset('storage/uploads/admin/photos/'.$this->avatar);
        }
        return '/storage/admin/image/avatar/'.$this->gender.'_avatar.png';
    }

    public function getFullnameAttribute($value)
    {
        return $this->firstname.' '. $this->lastname;
    }


}
