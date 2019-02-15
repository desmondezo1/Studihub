<?php

namespace Studihub\Http\Middleware;

use Closure;
use function Sodium\add;

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
            $request->attributes->set('slug',$slug);
            session()->flash('slug', $slug);
            return redirect('pricing')->with('slug', $slug);
        }
        return $next($request);
    }
}
