<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;
use Studihub\Models\Course;
use Studihub\Models\topic;


class CourseController extends Controller
{

    //
    public function index(){
        $courses = Course::all();
        return view('pages.layouts.courses.index',compact('courses'));
    }

    public function show($slug){
        $course = Course::find($slug);
        $topic = Topic::where('course_id', $slug);
        return view('pages.layouts.courses.show')->with('topic',$topic)->with('course',$course);
    }
}
