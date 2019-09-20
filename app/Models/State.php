<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';


    protected $fillable = ['country_id', 'name'];

    public function user() {
        return $this->hasManyThrough('App\Models\User', 'id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
}
