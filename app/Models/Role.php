<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Support\Facades\Config;

class Role extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description'];

    public function users()
    {
        return $this->hasMany('Studihub\Models\User');
    }


    public function permissions()
    {
        return $this->belongsToMany('Studihub\Models\Permission');
    }
}
