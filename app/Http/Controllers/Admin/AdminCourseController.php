<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Http\Controllers\Controller;
use Studihub\Models\course;
use Studihub\Models\CourseCategory;
use Intervention\Image\Facades\Image;
use Intervention\Image\Constraint;
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
        $categories = CourseCategory::all();
       /* foreach ($categories as $category){
            dd($category->category);
        }*/
        return view('admin.pages.courses.create',compact('categories'));
    }

    public function store(Request $request){
        //dd($request->file('photo'));
        //dd($request->file('photo'));
        $data = request()->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'photo' => 'required',
            'visible' => 'nullable',
            'course_category_id' => 'required',
        ]);
        $photo = $this->uploadPhoto($request);
        if($photo != null){
            $course = Course::create([
                'title' => str::title($data['title']),
                'summary' => $data['summary'],
                'photo' => $photo,
                'visible' => isset($data['visible'])? 1 : 0,
                'course_category_id' => $data['course_category_id'],
            ]);

            if ($course->id != null){
                flash()->success('success', $course->title.' Course Created');
                //dd(flash('success', "Course Added"));
                return redirect()->route('admin.courses.index');
            }
            if(File::exists(public_path('storage/uploads/courses/icons/'.$photo))) {
                File::delete(public_path('storage/uploads/courses/icons/'.$photo));
            }
            if(File::exists(public_path('storage/uploads/courses/icons/thumbnails/'.$photo))) {
                File::delete(public_path('storage/uploads/courses/icons/thumbnails/'.$photo));
            }
            //return back(301)->withInput()->withErrors('Could not add course. Try again' );
        }else{
            return back(301)->withInput()->withErrors('Error Uploading photo. Try again');
        }
        return back()->withInput();
    }

    public function edit($slug){
        $course = Course::findBySlug($slug);
        $categories = CourseCategory::all();
        return view('admin.pages.courses.edit',compact('categories', 'course'));
    }

    public function update(Request $request){
        $data = request()->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'photo' => 'nullable',
            'visible' => 'nullable',
            'course_category_id' => 'required',
        ]);
        $photo = $this->uploadPhoto($request);
        //dd((request()->input('slug')));
        $course = Course::findBySlugOrFail(request()->input('slug'));
        $updated = $course->update([
            'title' => str::title($data['title']),
            'summary' => $data['summary'],
            'photo' => $photo,
            'visible' => isset($data['visible'])? 1 : 0,
            'course_category_id' => $data['course_category_id'],
        ]);

        if ($updated){
            //flash('success', "Course Added");
            flash()->success('success', $course->title.' Course Updated');
            return redirect()->route('admin.courses.index');
        }
        if(File::exists(public_path('storage/'.$photo))) {
            File::delete(public_path('storage/'.$photo));
        }
        if(File::exists(public_path('storage/'.$photo))) {
            File::delete(public_path('storage/'.$photo));
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
            $photo = $course->photo;
            if(File::exists(public_path('storage/'.$photo))) {
                File::delete(public_path('storage/'.$photo));
            }
            if(File::exists(public_path('storage/'.$photo))) {
                File::delete(public_path('storage/'.$photo));
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

            Storage::disk('public')->put($folder.'thumbnails/'.$name, $small_image, 'public');
/*            $large_image = Image::make($file)
                ->resize(960, 960, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode($file->getClientOriginalExtension(), 75);
            //dd($large_image);
            Storage::disk('public')->put($folder.$name, $large_image, 'public');*/
            $file_path = $folder.'thumbnails/'.$name;
            //dd(file_exists(public_path('storage/'.$folder.'thumbnails/'.$name)));
            if(file_exists(public_path('storage/'.$folder.'thumbnails/'.$name))){
                return $file_path;
            }
            return null;
        }
        return null;
    }
}
