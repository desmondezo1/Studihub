<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //all ajax 
   public function AjaxTopicSearch()
    { $data = "tell us";
        return response()->json(array('data'=>$data),200);
    }

}
