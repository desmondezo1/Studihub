<?php

namespace Studihub\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectTeacherIfNotAuthenticated
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
        if(Auth::guard('tutor')->guest() || !Auth::guard('tutor')->check()){
            return redirect()->route('login');
        }

        return $next($request);
    }
}
