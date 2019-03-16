<?php

namespace Studihub\Http\Controllers\Tutor\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Studihub\Http\Controllers\Controller;
use Studihub\Models\Tutor;
use Studihub\Notifications\VerifyTutor;

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
    protected $redirectTo = '/tutor/register/verify';

    public function __construct()
    {
        //$this->middleware(['students','tutors'])->except('logout');
    }

    public function showRegistrationForm()
    {
        return view('tutor.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:tutors',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|min:6|string|max:255',
            'password_confirmation' => 'required|string',
        ]);
    }

    protected function create(array $data)
    {
        return Tutor::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verification_code' => $this->vCode()
        ]);
    }

    public function register(Request $request)
    {
        $data = [
            'firstname' => request()->input('firstname'),
            'lastname' => request()->input('lastname'),
            'email' => request()->input('email'),
            'password' => request()->input('password'),
            'password_confirmation' => request()->input('password_confirmation'),
        ];
        $val = $this->validator($data);
       // dd($this->create($data));
        if($val->passes()){
            $tutor = $this->create($data);
            if($tutor->id != ''){
                $tutor->notify(new VerifyTutor($tutor->verification_code, $tutor));
                return redirect()->route('verification.notice');
            }
        }
        return back()->withErrors($val);
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
}
