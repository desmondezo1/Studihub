<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Models\course;
use Studihub\Models\CourseCategory;

class AdminCourseController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index(){
        $courses = Course::all();

        return view('admin.pages.courses.index',compact('courses'));
    }

    public function show($slug){

    }

    public function create(){
        return view('admin.pages.courses.create');
    }

    public function store(Request $request){
        //dd($request->file('photo'));
        //dd($request->file('photo'));
        $data = request()->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'photo' => 'required',
            'hidden' => 'nullable',
        ]);
        $photo = $this->uploadPhoto($request);

        if ($photo != null){
            $course = Course::create([
                'title' => str::title($data['title']),
                'summary' => $data['summary'],
                'photo' => $photo,
                'hidden' => isset($data['hidden'])? 1 : 0,
            ]);

            if ($course->id != null){
                flash()->success('success', $course->title.' Course Created');
                //dd(flash('success', "Course Added"));
                return redirect()->route('admin.courses.index');
            }
            if(File::exists(public_path($photo))) {
                File::delete(public_path($photo));
            }
        }else{
            return back(301)->withInput()->withErrors('Error Uploading photo. Try again');
        }
        return back()->withInput();
    }

    public function edit($slug){
        $course = Course::findBySlug($slug);
        return view('admin.pages.courses.edit',compact('course'));
    }

    public function update(Request $request){
        $data = request()->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'photo' => 'nullable',
            'hidden' => 'nullable',
        ]);
        $photo = $this->uploadPhoto($request);
        //dd((request()->input('slug')));
        $course = Course::findBySlugOrFail(request()->input('slug'));
        $updated = $course->update([
            'title' => str::title($data['title']),
            'summary' => $data['summary'],
            'photo' => $photo ? $photo : $course->photo,
            'hidden' => isset($data['hidden'])? 1 : 0,
        ]);

        if ($updated){
            //flash('success', "Course Added");
            flash()->success('success', $course->title.' Course Updated');
            return redirect()->route('admin.courses.index');
        }
        return back()->withInput();

    }

    public function destroy(){
        $ids = request()->input('ids');
        //dd(is_array($ids));
        if(is_array(explode(",",$ids))){
            $course = DB::table("courses")->whereIn('id',explode(",",$ids))->delete();
            //Post::destroy($ids);
            return response()->json(['success'=>"Courses Deleted successfully."]);
        }else {
            $course = Course::findOrFail($ids);
            if(File::exists(public_path($course->photo))) {
                File::delete(public_path($course->photo));
            }
            $course->delete();
            return response()->json(['success' => "Course Deleted successfully."]);
        }
    }

    public function uploadPhoto(Request $request){
        $file = $request->file('photo');

        //dd($file->getClientOriginalName());
        if ($file != null){
            $strippedName = str_replace(' ', '', $file->getClientOriginalName());
            $name = date('Y-m-d-H-i-s').'-'.pathinfo($strippedName, PATHINFO_FILENAME).'.png';
            //dd($name);

            $folder = 'uploads/courses/icons/';
            $small_image = Image::make($file)
                ->resize(640, 460)
                ->encode($file->getClientOriginalExtension(), 75);

            $uploaded = Storage::disk('public')->put($folder.$name, $small_image, 'public');

            $file_path = 'storage/'.$folder.$name;
            //dd(file_exists(public_path('storage/'.$folder.'thumbnails/'.$name)));
            if($uploaded){
                return $file_path;
            }
            return null;
        }
        return null;
    }
}
