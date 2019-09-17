<?php

namespace Studihub\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

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
        'mime_path',
        'isfree',
        'hidden',
    ];

    protected $guarded = ['id','course_id'];

    protected $hidden = [
        'course_id',
        'notes',
        'topic_order',
        'mime_type',
        'mime_size',
        'mime_path',
        'isfree',
        'hidden',
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

    public function course()
    {
        return $this->belongsTo('Studihub\Models\Course', 'course_id', 'id');
    }

    public function tutors()
    {
        return $this->belongsToMany('Studihub\Models\Tutor', 'course_tutors');
    }

    public function videoData()
    {
        return $this->hasOne('Studihub\Models\VideoData', 'topic_id', 'id');
    }
}
