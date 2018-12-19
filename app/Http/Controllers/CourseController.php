<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;
use Studihub\Models\Course;
use Studihub\Models\topic;


class CourseController extends Controller
{

    //
    public function index(){
        $course= Course::all();
        return view('pages.layouts.courses.index')->with('name','Courses')->with('course',$course);
    }

    public function show($slug){
        $topic = Course::find($slug);
        return view('pages.layouts.courses.show')->with('topic',$topic);
    }
}
