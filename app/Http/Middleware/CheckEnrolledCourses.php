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
        $topic = Topic::findBySlugOrFail($slug)->with('course')->first();
        if($topic != null){
            if(!$topic->isfree){
                if(!Auth()->guard("student")->user()->isCourseSubscribed($slug)){
                    $request->attributes->set('id',$topic->course_id);
                    session()->flash('id', $topic->course_id);
                    return redirect('pricing')->with('id', $topic->course_id);
                }
            }
            return $next($request);
        }
        return $next($request);
    }
}
