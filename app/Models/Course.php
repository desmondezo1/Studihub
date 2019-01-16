<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;

class course extends Model
{

    use Sluggable, SluggableScopeHelpers, Taggable;

    protected $table = "courses";

    protected $fillable = ['title','slug','summary','image_path'];

    protected $guarded = ['id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function authorId()
    {
        return $this->belongsToMany('Studihub\Models\Tutor', 'tutor_id', 'id');
    }

    public function topics(){
        return $this->hasMany('Studihub\Models\Topic');
    }
}
