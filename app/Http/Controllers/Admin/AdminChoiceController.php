<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Models\Choice;
use Studihub\Models\Question;

class AdminChoiceController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $choices = Choice::orderBy('created_at', 'DESC')->get()->groupBy('question_id');
        return view('admin.pages.choices.index',compact('choices'));
    }

    public function show($slug){

    }

    public function create(){
        $questions = Question::all();
        return view('admin.pages.choices.create',compact('questions'));
    }

    public function store(Request $request){
        //dd($request->get('choice_desc'));
        $data = request()->validate([
            'question_id' => 'required',
            'choice_desc' => 'required',
            'choice_option' => 'required',
            'is_correct' => 'nullable',

        ]);

        //dd($request->all());
        $choice = Choice::create([
            'question_id' => $data['question_id'],
            'choice_desc' => $data['choice_desc'],
            'choice_option' => $data['choice_option'],
            'is_correct' => $request->input('is_correct') ? true : false,
        ]);

        if($choice->id != null){
            //$topic->tag(strtolower($data['tag_names']));
            return response()->json(['message' => "Choice Added"]);
        }
        return response()->json(['message' => "Unable to add choice",'status'=>'error']);
    }

    public function edit($id){
        $questions = Question::pluck('question_desc','id');
        $choice = Choice::find($id);
        return view('admin.pages.choices.edit',compact('choice','questions'));
    }

    public function update(Choice $choice){
        //dd($request->all());
        $updated = $choice->update([
            'question_id' => request()->input('question_id'),
            'choice_desc' => request()->input('choice_desc'),
            'choice_option' => request()->input('choice_option'),
            'is_correct' => request()->input('is_correct') ? true : false,
        ]);

        if($updated){
            flash()->success('success', ' Choice Updated');
            return redirect()->route('admin.choices.index');
        }
        flash()->error('error', "Unable to create choice. Try again");
        return back()->withInput();
    }

    public function destroy(Choice $choice){
        $ids = request()->input('ids');
        //dd(is_array($ids));
        if(is_array(explode(",",$ids))){
            $choice = DB::table("question_choices")->whereIn('id',explode(",",$ids))->delete();
            return response()->json(['success'=>"Choices Deleted successfully."]);
        }else {
            $choice = Choice::findOrFail($ids);
            $choice->delete();
            return response()->json(['success' => "Choice Deleted successfully."]);
        }
    }

    public function checkChoice(){
        $correct_count = DB::table('question_choices')
            ->select(DB::raw('count(*) as is_correct'))
            ->where('question_id',request()->get('id'))
            ->where('is_correct', '=', true)
            ->count();
        return response()->json(['correct_count'=>$correct_count]);
    }
}
