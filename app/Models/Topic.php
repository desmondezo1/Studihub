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

    protected $fillable = [
        'title','slug',
        'course_id',
        'notes',
        'topic_order',
        'mime_type',
        'mime_size',
        'mime_path'
    ];

    protected $guarded = ['id','course_id'];

    protected $hidden = [
        'course_id'
    ];

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

    public function courses()
    {
        return $this->belongsTo('Studihub\Models\Course', 'course_id', 'id');
    }
}
