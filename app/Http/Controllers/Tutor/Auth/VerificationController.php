<?php

namespace Studihub\Http\Controllers\Tutor\Auth;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Studihub\Models\Tutor;
use Studihub\Notifications\VerifyTutor;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be resent if the user did not receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    //protected $redirectTo = '/tutor';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('tutor-auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verifyEmail(Request $request)
    {
        $tutor = Tutor::where('email', '=', $request->email)->where('verification_code', '=', $request->code)->first();
        if($tutor != ''){
            if ($tutor->verified) {
                return redirect()->route('tutor.login')
                    ->with('success', 'You have already verified your email.');
            } elseif ($tutor) {
                $tutor->email_verified_at = Carbon::now();
                $tutor->verification_code = "";
                $tutor->update();

                return redirect()->route('tutor.login')
                    ->with('success', 'You have successfully verified your email. Please login now.');
            } else {
                return redirect()->route('tutor.register')
                    ->withErrors('You have successfully verified your email. Please login now.');
            }
        }
        return redirect()->route('tutor.register')
            ->withErrors("No account found matching verification.Please register if you haven't or contact Admin.");
    }

    public function shouldVerify()
    {
        return view('tutor.auth.verify');

    }

    public function getResend(Request $request)
    {
        return view('tutor.auth.email');
    }

    public function resend(Request $request)
    {
        $email = $request->validate([
            'email' => 'required|string|email|max:255'
        ]);
        //dd($email);
        $tutor = Tutor::where('email', '=', $email)->first();
        if($tutor != ''){
           // dd($tutor);
                $tutor->notify(new VerifyTutor($tutor->verification_code, $tutor));
                return redirect()->route('verification.notice');
        }
        return redirect()->back()
            ->withErrors(trans('auth.failed'))
            ->with('stutus', 'danger');

    }
}
