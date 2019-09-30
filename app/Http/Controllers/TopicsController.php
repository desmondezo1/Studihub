<?php

namespace Studihub\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Studihub\Models\Topic;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

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
       
        $topic = Topic::findBySlugOrFail($slug);
        $related_topics = Topic::where('course_id', $topic->course_id)->get();
        $topic_id = 'topic_'.$topic->id;
        if(!Session::has($topic_id)){
            $topic->increment('views');
            Session::put($topic_id, 1);
        }
        return view('pages.layouts.topics.show', compact('topic','related_topics'));
    }

    public function search(Request $request){

        $q = $request->input('q','Request not recieved');
        $TopicsFound = Topic::where('title','LIKE','%'.$q.'%')->get();
       
        return view('pages.layouts.topics.search', ['TopicsFound' => $TopicsFound]);
    }
}
