<?php

namespace Studihub\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class course extends Model
{

    use Sluggable, SluggableScopeHelpers, Taggable;

    protected $table = "courses";

    protected $fillable = ['title','slug','summary','photo',"hidden"];

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

    public function tutors()
    {
        return $this->belongsToMany('Studihub\Models\Tutor', 'tutor_id', 'id');
    }

    public function topics(){
        return $this->hasMany('Studihub\Models\Topic');
    }

    public function category(){
        return $this->belongsTo("Studihub\Models\CourseCategory", "course_category_id");
    }

    public function enrolledCourses(){
        return $this->belongsTo("Studihub\Models\EnrolledCourse", "course_id");
    }

    public static function boot() {
        // Reference the parent::boot() class.
        parent::boot();
        Course::deleting(function($courses) {
            foreach($courses as $course){
                if(File::exists(public_path($course->photo))) {
                    File::delete(public_path($course->photo));
                }
            }
        });
    }

}
