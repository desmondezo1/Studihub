<?php

namespace Studihub\Http\Controllers;

use Illuminate\Http\Request;
use Studihub\Models\RequestTutor;
use Studihub\Models\State;

class RequestPrivateTutorController extends Controller
{
    public function index(){

    }

    public function create(){
        $states = State::all();
        return view('privatetutor.index',compact('states'));
    }

    public function store(Request $request){
        $data = request()->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric|regex:/[0-9]{10}/|digits:11',
            'gender' => 'required',
            'state' => 'required|string|max:255',
            'address' => 'required',
            'comment' => 'required',
        ]);

        $tutorRequest = RequestTutor::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'state' => $data['state'],
            'address' => $data['address'],
            'comment' => $data['comment'],
        ]);

        if($tutorRequest->id != null){
            return back()->with('success', 'Sent Successfully, Admin will contact you soon');
        }
        return back();
    }
}
