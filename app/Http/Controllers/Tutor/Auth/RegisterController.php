<?php

namespace Studihub\Http\Controllers\Tutor\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Studihub\Http\Controllers\Controller;
use Studihub\Http\Traits\UploadTutorPhotoTrait;
use Studihub\Models\State;
use Studihub\Models\Tutor;
use Studihub\Notifications\VerifyTutor;

class RegisterController extends Controller
{
    use UploadTutorPhotoTrait;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/tutor/register/verify';

    public function __construct()
    {
        //$this->middleware(['students','tutors'])->except('logout');
    }

    public function showRegistrationForm()
    {
        $states = State::all();
        return view('tutor.auth.register',compact('states'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:tutors',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string',
            'state' => 'required',
            'city' => 'required',
            'bio' => 'required',
            'school' => 'required',
            'course' => 'required',
            'degree' => 'required',
            'company' => 'required',
            'experience' => 'required',
            'role' => 'required',
            'stillworkthere' => 'nullable',
            'classname' => 'nullable',
            'curriculum' => 'nullable',
            'social_media' => 'nullable',
            'terms' => 'required',
            'password' => 'required|min:6|max:255',
            'password_confirmation' => 'required',
        ]);
    }

    protected function create(array $data)
    {
        return Tutor::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'state' => $data['state'],
            'city' => $data['city'],
            'bio' => $data['bio'],
            'school' => $data['school'],
            'course' => $data['course'],
            'degree' => $data['degree'],
            'company' => $data['company'],
            'avatar' => $data['avatar'],
            'experience' => $data['experience'],
            'role' => $data['role'],
            'stillworkthere' => $data['stillworkthere'],
            'classname' => $data['classname'],
            'curriculum' => $data['curriculum'],
            'social_media' => json_encode($data['social_media']),
            'password' => bcrypt($data['password']),
            'verification_code' => $this->vCode()
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email|max:255|unique:tutors',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string',
            'state' => 'required',
            'city' => 'required',
            'bio' => 'required',
            'school' => 'required',
            'course' => 'required',
            'degree' => 'required',
            'company' => 'required',
            'avatar' => 'nullable',
            'experience' => 'required',
            'role' => 'required',
            'stillworkthere' => 'nullable',
            'classname' => 'nullable',
            'curriculum' => 'nullable',
            'social_media' => 'nullable',
            'terms' => 'required',
            'password' => 'required|min:6|max:255',
            'password_confirmation' => 'required',
        ]);
        //dd($data);
            $tutor = Tutor::create([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'dob' => $data['dob'],
                'address' => $data['address'],
                'state' => $data['state'],
                'city' => $data['city'],
                'bio' => $data['bio'],
                'school' => $data['school'],
                'course' => $data['course'],
                'degree' => $data['degree'],
                'company' => $data['company'],
                'avatar' => $data['avatar'],
                'experience' => $data['experience'],
                'role' => $data['role'],
                'stillworkthere' => $request->input('stillworkthere') != '' ? $data['stillworkthere'] : 0,
                'classname' => $data['classname'],
                'curriculum' => $data['curriculum'],
                'social_media' => json_encode($data['social_media']),
                'password' => bcrypt($data['password']),
                'verification_code' => $this->vCode()
            ]);
            if($tutor->id != ''){
                $tutor->notify(new VerifyTutor($tutor->verification_code, $tutor));
                return redirect()->route('verification.notice');
            }
        return back();
    }

    //Get the guard to authenticate Seller
    protected function guard($guard)
    {
        return Auth::guard($guard);
    }

    private function vCode(){
        $salt       = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
        $len        = strlen($salt);
        $code   = '';
        mt_srand(10000000*(double)microtime());
        for ($i = 0; $i < 12; $i++) {
            $code .= $salt[mt_rand(0,$len - 1)];
        }
        return $code;
    }

    public function resend(){

    }

    public function uploadPhoto(Request $request){
        return $this->uploadAvatar($request);
    }
}
