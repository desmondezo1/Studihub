<?php

namespace Studihub\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectStudentIfAuthenticated
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
        //dd($next);
        if(Auth::guard('student')->check()){
            return redirect()->route('student.index');
        }
        return $next($request);
    }
}
