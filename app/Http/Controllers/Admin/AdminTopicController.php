<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Http\Controllers\Controller;
use Studihub\Models\course;
use Studihub\Models\Topic;

class AdminTopicController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $topics = Topic::with('courses')->get();
        return view('admin.pages.topics.index',compact('topics'));
    }

    public function show($slug){
        $topic = Topic::findBySlug($slug);
        return view('admin.pages.topics.read',compact('topic'));
    }

    public function create(){
        $courses = Course::where('visible', true)->get();
        return view('admin.pages.topics.create',compact('courses'));
    }

    public function store(Request $request){

    }

    public function update(Topic $topic){

    }

    public function destroy(Topic $topic){

    }
}
