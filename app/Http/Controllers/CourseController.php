<?php

namespace Studihub\Http\Controllers;

use Studihub\Models\Course;
use Studihub\Models\topic;


class CourseController extends Controller
{

    //
    public function index(){
        $courses = Course::all();
        return view('pages.layouts.courses.index',compact('courses'));
    }
    
   //Get the Topics of the subject from the id and display the list
    public function show($slug){
        $course = Course::findBySlug($slug);
        $topics = Topic::where('course_id', $slug);
        return view('pages.layouts.courses.show')->with('topic',$topics)->with('course',$course);
    }
}
