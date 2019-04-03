<?php

namespace Studihub\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Studihub\Models\Topic;

class TopicsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        $topics = Topic::all();
        return view('pages.layouts.topics.index')->with('topic',$topics);
    }

    public function show($slug){
        //select all courses from the table with the same course id 
        //$topicList = Topic::all();
        $topic = Topic::findBySlugOrFail($slug);
        $topicList = Topic::all();
        //dd($topicList);
       // $topicList = Topic::findByCourse_idOrFail($topic->course_id);
        //$topicList = DB::select( DB::raw("SELECT course_id FROM topics WHERE slug = '$slug'") );
        //$topicList = DB::table('topics')->select('course_id')->whereRaw('slug = "$slug"')->get();
        $topic_id = 'topic_'.$topic->id;
        if(!Session::has($topic_id)){
            $topic->increment('views');
            Session::put($topic_id, 1);
        }
        return view('pages.layouts.topics.show')->with('topic',$topic)->with('topicList',$topicList);
    }
}
