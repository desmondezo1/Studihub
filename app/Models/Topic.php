<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;

class Topic extends Model
{

    use Sluggable, SluggableScopeHelpers, Taggable;

    protected $table = "topics";

    protected $fillable = ['title'];

    protected $guarded = ['id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function courses() {
        return $this->hasMany('Studihub\Models\Courses', 'id');
    }
}
