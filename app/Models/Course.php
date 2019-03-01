<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\File;

class course extends Model
{

    use Sluggable, SluggableScopeHelpers, Taggable;

    protected $table = "courses";

    protected $fillable = ['title','slug','summary','photo',"course_category_id"];

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
                $photo = $course->photo;
               // dd($photo);
                if(File::exists(public_path('storage/uploads/courses/icons/'.$photo))) {
                    File::delete(public_path('storage/uploads/courses/icons/'.$photo));
                }
                if(File::exists(public_path('storage/uploads/courses/icons/thumbnails/'.$photo))) {
                    File::delete(public_path('storage/uploads/courses/icons/thumbnails/'.$photo));
                }
            }
        });
    }

}
