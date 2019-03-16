<?php

namespace Studihub\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Studihub\Http\Controllers\Controller;
use Studihub\Models\Student;
use Studihub\Notifications\StudentRegistrationNotification;

class RegisterController extends Controller
{

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
    protected $redirectTo = '/student';


    public function __construct()
    {
        //$this->middleware('student-auth')->except('logout');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:students',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:255|confirmed',
            'password_confirmation' => 'required|string',
        ]);
    }

    protected function create(array $data)
    {
        return Student::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'username' => $this->generateUsername($data['email']),
            'password' => bcrypt($data['password']),
        ]);

    }

    public function register(Request $request)
    {
        $data = [
            'firstname' => request()->input('firstname'),
            'lastname' => request()->input('lastname'),
            'email' => request()->input('email'),
            'username' => request()->input('username'),
            'password' => request()->input('password'),
            'password_confirmation' => request()->input('password_confirmation'),
        ];
        //validate student credentials
        $val = $this->validator($data);
        //dd($val);
        if($val->passes()){
            $student = $this->create($data);
            if($student->id != ''){
                //Todo: send email notification for registration along with the username
                $student->notify(new StudentRegistrationNotification($student));
                return redirect()->route('student.index');
            }
        }
        return back()->withErrors($val);

    }

    //Get the guard to authenticate Seller
    protected function guard($guard)
    {
        return Auth::guard($guard);
    }

    //use all characters before @ as username
    private function generateUsername($email){
        $username = strstr($email, '@', true);
        return $username;
    }
}
