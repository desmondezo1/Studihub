<?php

namespace Studihub\Http\Controllers\Tutor\Auth;

use Illuminate\Http\Request;
use Studihub\Models\Student;
use Studihub\Models\User;
use Studihub\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Studihub\Models\Tutor;
use Studihub\Notifications\VerifyTutor;
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
    protected $redirectTo = '/successfull';

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
                return redirect()->route('auth.verify');
            }
        }
        return back()->withErrors($val);
    }

    //Get the guard to authenticate Seller
    protected function guard($guard)
    {
        return Auth::guard($guard);
    }

    public function verifyEmail(Request $request)
    {
        $tutor = Tutor::where('email', '=', $request->email)->where('verification_code', '=', $request->code)->first();
        if($tutor != ''){
            if ($tutor->verified) {
                return redirect()->route('login')
                    ->with('success', 'You have already verified your email.');
            } elseif ($tutor) {
                $tutor->verified = 1;
                $tutor->update();

                return redirect()->route('login')
                    ->with('success', 'You have successfully verified your email. Please login now.');
            } else {
                return redirect()->route('register')
                    ->withErrors('You have successfully verified your email. Please login now.');
            }
        }
        return redirect()->route('register')
            ->withErrors("No account found matching verification.Please register if you haven't or contact Admin.");
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
}
