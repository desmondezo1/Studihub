<?php

namespace StudiHUB\Http\Controllers;

use Illuminate\Http\Request;

class CourseContentController extends Controller
{
    //
    public function displayContent(){
        return view('course-content.course-content')->with('name','Courses');
    }
}
