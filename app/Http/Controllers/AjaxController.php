<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class AjaxController extends Controller
{
    //all ajax 
    public function AjaxTopicSearch(Request $request){

    if($request->ajax()){

    $output="";
    $result=DB::table('topics')->where('title','LIKE','%'.$request->search."%")->get();

    if($result){

    foreach ($result as $result){
    $href = "href='/learn/$result->slug'";
    $output.= "<li class='list-group-item'>
    <a style='color:#fff; text-decoration:none;' " .$href. ">" .$result->title."</a>
    </li>";
    }

    return Response($output);
       }
        
    }
    }
    }
