<?php

namespace Studihub\Models;

use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable implements BannableContract
{
    use Notifiable ,EntrustUserTrait,Bannable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'avatar', 'password','phone','gender','city',
        'state','address'
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
            return asset($this->avatar);
        }
        return '/storage/admin/image/avatar/'.$this->gender.'_avatar.png';
    }

    public function getFullnameAttribute($value)
    {
        return $this->firstname.' '. $this->lastname;
    }




}
