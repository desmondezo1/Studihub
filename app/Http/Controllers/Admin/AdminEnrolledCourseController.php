<?php

namespace Studihub\Http\Controllers\Admin;

use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Models\EnrolledCourse;

class AdminEnrolledCourseController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $enrolledCourses = EnrolledCourse::with('students')->get();
        return view('admin.pages.courses.enrolled.index',compact('enrolledCourses'));
    }

    public function show(EnrolledCourse $enrolledCourse){
        return view('admin.pages.courses.enrolled.index',compact('enrolledCourse'));
    }


    public function chart(){
        return back();
    }

}
