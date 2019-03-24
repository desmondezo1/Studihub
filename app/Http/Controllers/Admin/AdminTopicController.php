<?php

namespace Studihub\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Http\Traits\TopicVideoEmbedTrait;
use Studihub\Models\course;
use Studihub\Models\Topic;

class AdminTopicController extends AdminBaseController
{
    use TopicVideoEmbedTrait;
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $topics = Topic::with('course')->get();
       
        return view('admin.pages.topics.index',compact('topics'));
    }

    public function show($slug){
        $topic = Topic::findBySlug($slug);
        return view('admin.pages.topics.show',compact('topic'));
    }

    public function create(){
        $courses = Course::where('hidden', false)->get();
        return view('admin.pages.topics.create',compact('courses'));
    }

    public function store(Request $request){
        $data = request()->validate([
            'title' => 'required|max:255|min:3',
            'notes' => 'required|min:3',
            'course_id' => 'required',
            'hidden' => 'nullable',
            'published_at' => 'nullable|date',
            'status' => 'required',
            'isfree' => 'required',
            'embed' => 'nullable',
            'exam_type' => 'required',
        ]);
        //dd($request->all());
        if($data['status'] == 'PUBLISHED'){
            $published_at = Carbon::now();
        }elseif($data['status'] == 'DRAFT'){
            $published_at = Carbon::parse($data['published_at'])->format('Y-m-d H:i');
        }else{
            $published_at = Carbon::now();
        }
        //dd($request->all());
        $topic = Topic::create([
            'title' => str::title($data['title']),
            'notes' => $data['notes'],
            'course_id' => $data['course_id'],
            'exam_type' => $data['exam_type'],
            'hidden' => request()->input('hidden')?1:0,
            'published_at' => $published_at,
            'isfree' => request()->input('isfree') ? 1:0,
        ]);

        if($topic->id != null){
            $topic->tutors()->sync(Auth::user());
            $topic->videoData()->firstOrNew([
                'embed_url' => $data['embed'],
                'views' => 0,
                'replayed' => 0,
                'completed' => 0,
            ])->save();
            //$topic->tag(strtolower($data['tag_names']));
            flash()->success('success', $topic->title.' topic created');
            //event(new NewsLetter($topic, 'topic'));
            return redirect()->route('admin.topics.index');
        }
        return redirect()->back();
    }

    public function edit($slug){
        $topic = Topic::findBySlug($slug);
        $courses = Course::where('hidden', false)->pluck('title','id');
        return view('admin.pages.topics.edit',compact('topic','courses'));
    }

    public function update(Request $request){
        //dd($request->all());
        $data = request()->validate([
            'title' => 'required|max:255|min:3',
            'notes' => 'required|min:3',
            'course_id' => 'required',
            'hidden' => 'nullable',
            'isfree' => 'required',
            'embed' => 'nullable',
            'exam_type' => 'required',
        ]);


        $topic = Topic::findBySlugOrFail(request()->input('slug'));
        $updated = $topic->update([
            'title' => str::title($data['title']),
            'notes' => $data['notes'],
            'course_id' => $data['course_id'],
            'exam_type' => $data['exam_type'],
            'hidden' => request()->input('hidden')? 1:0,
            'isfree' => request()->input('isfree') ? 1:0,
        ]);

        if ($updated){
            if($request->input('embed') != null){
                $topic->videoData()->update([
                    'embed_url' => $request->input('embed'),
                ]);
            }
            flash()->success('success', $topic->title.' Topic Updated');
            return redirect()->route('admin.topics.index');
        }
        flash()->error('error', "Unable to create topic. Try again");
        return back()->withInput();

    }

    public function destroy(){
        $ids = request()->input('ids');
        //dd(is_array($ids));
        if(is_array(explode(",",$ids))){
            $topic = DB::table("topics")->whereIn('id',explode(",",$ids))->delete();
            //Post::destroy($ids);
            return response()->json(['success'=>"Topics Deleted successfully."]);
        }else {
            $topic = Topic::findOrFail($ids);
            $photo = $topic->photo;
            if(File::exists(public_path('storage/'.$photo))) {
                File::delete(public_path('storage/'.$photo));
            }
            $topic->delete();
            return response()->json(['success' => "Topic Deleted successfully."]);
        }
    }

    public function checkEmbedUrl(){
        $url = request()->input('url');
        return $this->checkEmbedLink($url);
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

            $uploaded = Storage::disk('public')->put($folder.'thumbnails/'.$name, $small_image, 'public');
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
            if($uploaded){
                return $file_path;
            }
            return null;
        }
        return null;
    }
}
