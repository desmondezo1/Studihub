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
        $topicList = Topic::all();
        $topic = Topic::findBySlugOrFail($slug);
        $topic_id = 'topic_'.$topic->id;
        if(!Session::has($topic_id)){
            $topic->increment('views');
            Session::put($topic_id, 1);
        }
        return view('pages.layouts.topics.show')->with('topic',$topic)->with('topicList',$topicList);
    }
}
