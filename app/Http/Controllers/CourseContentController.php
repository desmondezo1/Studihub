<?php

namespace StudiHUB\Http\Controllers;

use Illuminate\Http\Request;
use StudiHUB\Course;
use StudiHUB\topic;
 
       
class CourseContentController extends Controller
{
    
    //
    public function displayContent(){
        $course=Course::all();
        return view('course-content.course-content')->with('name','Courses')->with('course',$course);
    }
    public function listTopics($course_name)
    {
        $course=Course::where('name', '=',$course_name)->get();
        foreach ( $course as  $course) {
            $course_id = $course->id;
        }
        
        $topic=topic::where('course_id', '=',$course_id )->get();
        return view('course-content.course-details')->with('topic',$topic)->with('course_name',$course_name)->with('name','topics');

    }
    public function displayTopicsdetails($topic_title)
    {
        $topic=topic::where('title','=',$topic_title)->first();
        
        return view('course-content.show-topic')->with('topic',$topic)->with('name','Topics');


    }
    public function getVideo(Request $request)
    {
         //Select from DB where userid = $request->input('title');
         $title = $request->input('title');
         //Return json to the AJAX success function
        // User::all()->toJson();

        // return response()->json(['success' => 'User found']);
        return view('course-content.show-topic')->with('topic',$topic)->with('name','Topics1');
    }
}
