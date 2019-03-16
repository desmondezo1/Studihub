<?php

namespace Studihub\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectStudentIfNotAuthenticated
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
        //dd($request);
        if(Auth::guard('student')->guest() || !Auth::guard('student')->check()){
            return redirect()->route('login');
        }

        return $next($request);
    }
}
