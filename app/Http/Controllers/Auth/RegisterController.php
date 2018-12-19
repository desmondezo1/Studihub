<?php

namespace Studihub\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Studihub\Models\Student;
use Studihub\Models\User;
use Studihub\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Studihub\Models\Tutor;

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
    //protected $redirectTo = '/register/successful';
    public function __construct()
    {
        //$this->middleware(['students','tutors'])->except('logout');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        if($request->input('type') == 'tutor'){
            //validate tutor data. You can add more fields.
            $data = $request->validate([
                'email' => 'required|string|email|max:255|unique:tutors',
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'password' => 'required|min:6|string|max:255',
            ]);

            $tutor = new Tutor();
            $tutor->firstname = $data['firstname'];
            $tutor->lastname = $data['lastname'];
            $tutor->email = $data['email'];
            $tutor->password = bcrypt($data['password']);
            $tutor->verification_code = $this->vCode();
            $tutor->save();
            if($tutor->id != ''){
                $tutor->notify(new VerifyTutor($tutor->verification_code, $tutor));
                return redirect()->route('');
            }
        }elseif ($request->input('type') == 'student'){
            //validate student credentials
            $data = $request->validate([
                'email' => 'required|string|email|max:255|unique:students',
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'password' => 'required|string|min:6|max:255|confirmed',
                'password_confirmation' => 'required|string',
            ]);

            $student = new Student();
            $student->firstname = $data['firstname'];
            $student->lastname = $data['lastname'];
            $student->password = bcrypt($data['password']);
            $student->save();
            if($student->id != ''){
                return redirect()->route('student.index');
            }
        }
        return back();
    }

    //Get the guard to authenticate Seller
    protected function guard()
    {
        return Auth::guard(['students','teachers']);
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
