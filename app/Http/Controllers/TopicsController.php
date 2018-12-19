<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;
use Studihub\Models\Topic;

class TopicsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        $topics = Topic::all();
        return view('layouts.topics.index')->with('topic',$topics);
    }

    public function show($slug){
        $topic = Topic::find($slug);
        return view('layouts.topics.show')->with('topic',$topic);
    }
}
