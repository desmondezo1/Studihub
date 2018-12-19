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

    protected $fillable = ['name'];

    protected $guarded = ['id','seller_id'];

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
        return $this->belongsTo('Studihub\Models\Tutor', 'tutor_id', 'id');
    }
}
