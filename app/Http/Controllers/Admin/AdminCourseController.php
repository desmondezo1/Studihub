<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Http\Controllers\Controller;
use Studihub\Models\course;

class AdminCourseController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index(){
        return view('admin.pages.courses.index');
    }

    public function show($slug){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function update(Course $course){

    }

    public function destroy(Course $course){

    }
}
