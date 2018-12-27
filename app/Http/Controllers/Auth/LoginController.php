<?php

namespace Studihub\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $lockoutTime;

    protected  $maxLoginattempts;

    protected $auth;

    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['student-guest','tutor-guest'])->except('logout');
        $this->lockoutTime = 5;
        $this->maxLoginattempts = 3;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function credentials(Request $request)
    {
        $field = $this->username();

        return [
            $field => $request->input('login'),
            'password' => $request->password,
        ];
    }

    public function login(Request $request)
    {

        $remember = $request->input('remember');
        $data = $request->validate([
            $this->username() => 'required',
            'password' => 'required'
        ]);
        //dd($data);
        $credentials = $this->credentials($request);
        //dd($credentials);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
            return redirect()->back()
                ->withErrors('Incorrect '.$this->username().' or password.')
                ->with('status', 'danger');
        }else
        {
            if ($this->guard('student')->attempt($credentials, $request->has($remember))
            ) {
                $this->clearLoginAttempts($request);
                return redirect()->intended('student');
            }elseif ($this->guard('tutor')->attempt($credentials, $request->has($remember))
            ) {
                $this->clearLoginAttempts($request);
                return redirect()->intended('tutor');
            } else {
                $this->incrementLoginAttempts($request);
                return redirect()->back()
                    ->withErrors('Incorrect '.$this->username().' or password.')
                    ->with('status', 'danger')
                    ->withInput($request->only('email'));
            }
        }
    }

    //make student able to login with email or username
    public function username()
    {
        $login = request()->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => $login]);
        //dd($field);
        return $field;
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('login')
            ->with('status', 'success')
            ->with('message', 'Logged out');
    }

    protected function guard($guard)
    {
        return Auth::guard($guard);
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        //dd($this->throttleKey($request));
        return $this->limiter()->tooManyAttempts($this->throttleKey(
            $request),
            $this->maxLoginattempts
        );
    }
}
