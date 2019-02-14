<?php

namespace Studihub\Http\Middleware;

use Closure;

class CheckEnrolledCourses
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
        $slug = $request->route('slug');
        if(!Auth()->guard("student")->user()->isTopicBought($slug)){
            return redirect('pricing');
        }
        return $next($request);
    }
}
