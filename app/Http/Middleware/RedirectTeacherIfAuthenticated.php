<?php

namespace Studihub\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectTeacherIfAuthenticated
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
        if(Auth::guard('tutor')->check()){
            return redirect()->route('teacher.index');
        }
        return $next($request);
    }
}
