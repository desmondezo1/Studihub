<?php

namespace Studihub\Http\Middleware;

use Closure;
use Studihub\Models\Topic;

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
        if(!Auth()->guard("student")->user()->isCourseSubscribed($slug)){
            $topic = Topic::findBySlugOrFail($slug)->with('courses')->first();
            $request->attributes->set('id',$topic->course_id);
            session()->flash('id', $topic->course_id);
            return redirect('pricing')->with('id', $topic->course_id);
        }
        return $next($request);
    }
}
