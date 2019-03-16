<?php

namespace Studihub\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Models\Question;
use Studihub\Models\Topic;

class AdminQuestionController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $questions = Question::all();
        return view('admin.pages.questions.index',compact('questions'));
    }

    public function show($slug){

    }

    public function create(){
        $topics = Topic::where('hidden', false)->get();
        return view('admin.pages.questions.create',compact('topics'));
    }

    public function store(Request $request){

       // dd($request->all());
        $data = request()->validate([
            'question_desc' => 'required',
            'topic_id' => 'required',
            'hidden' => 'nullable',
            'published_at' => 'nullable|date',
            'status' => 'required',
            'question_difficulty' => 'required',
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
        $question = Question::create([
            'question_desc' => $data['question_desc'],
            'topic_id' => $data['topic_id'],
            'exam_type' => $data['exam_type'],
            'hidden' => request()->input('hidden')?1:0,
            'published_at' => $published_at,
            'question_difficulty' => $data['question_difficulty'],
        ]);

        if($question->id != null){
            //$topic->tag(strtolower($data['tag_names']));
            flash()->success('success', ' Question created');
            //event(new NewsLetter($topic, 'topic'));
            return redirect()->route('admin.questions.index');
        }
        flash()->error('error', ' Error has occured. Check and try again');
        return redirect()->back();
    }

    public function edit($id){
        $topics = Topic::where('hidden', false)->pluck('id','title');
        $question = Question::find($id);
        return view('admin.pages.questions.edit',compact('topics','question'));
    }

    public function update(Question $question){
        $data = request()->validate([
            'title' => 'nullable|max:255|min:3',
            'notes' => 'nullable|min:3',
            'course_id' => 'nullable',
            'hidden' => 'nullable',
            'isfree' => 'nullable',
            'embed' => 'nullable',
            'exam_type' => 'nullable',
        ]);
        $updated = $question->update([
            'title' => str::title(request()->input('title')),
            'notes' => request()->input('notes'),
            'course_id' => request()->input('course_id'),
            'exam_type' => request()->input('exam_type'),
            'hidden' => request()->input('hidden')? 1:0,
            'isfree' => request()->input('isfree') ? 1:0,
        ]);

        if ($updated){
            if(request()->input('embed') != null){
                $question->videoData()->update([
                    'embed_url' => request()->input('embed'),
                ]);
            }
            flash()->success('success', $question->title.' Topic Updated');
            return redirect()->route('admin.topics.index');
        }
        flash()->error('error', "Unable to create topic. Try again");
        return back()->withInput();
    }

    public function destroy(Question $question){
        $ids = request()->input('ids');
        //dd(is_array($ids));
        if(is_array(explode(",",$ids))){
            $topic = DB::table("question_banks")->whereIn('id',explode(",",$ids))->delete();
            //Post::destroy($ids);
            return response()->json(['success'=>"Questions Deleted successfully."]);
        }else {
            $question = Question::findOrFail($ids);
            $question->delete();
            return response()->json(['success' => "Question Deleted successfully."]);
        }
    }
}
