<?php

namespace Studihub\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Studihub\Models\Tutor;

class VerifiedTutor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
/*        if(Auth::guard('tutor')->check()){
            if(!Auth::guard('tutor')->user()->hasVerifiedEmail()){
                Auth::guard('tutor')->logout();
                $request->session()->regenerate();
                return redirect()->route('verification.notice');
            }
        }*/

        if (! $request->user('tutor') ||
            ($request->user('tutor') instanceof Tutor &&
                ! $request->user('tutor')->hasVerifiedEmail())) {
            Auth::guard('tutor')->logout();
            $request->session()->regenerate();
            return $request->expectsJson()
                ? abort(403, 'Your email address is not verified.')
                : redirect()->route('verification.notice');
        }

        return $next($request);
    }
}
