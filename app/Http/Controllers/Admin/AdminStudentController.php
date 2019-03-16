<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Models\EnrolledCourse;
use Studihub\Models\Student;

class AdminStudentController extends AdminBaseController
{
    public function index(){
        $students = Student::orderBy('created_at', 'DESC')->withBanned()->get();
        //dd($students);
        return view('admin.pages.students.index',compact('students'));
    }

    public function show(Student $student){
        return view('admin.pages.students.show', compact('student'));
    }


    public function destroy(){
        $ids = request()->input('ids');
        //dd(is_array($ids));
        if(is_array(explode(",",$ids))){
            $students = DB::table("students")->whereIn('id',explode(",",$ids))->delete();
            return response()->json(['success'=>"Students Deleted successfully."]);
        }else {
            $student = Student::findOrFail($ids);
            $student->delete();
            return response()->json(['success' => "Student Deleted successfully."]);
        }
    }

    public function banstudent($id){
        $student = Student::find($id);
        if ($student->isNotBanned()){
            $student->ban([
                'comment' => 'Enjoy your ban!',
            ]);
            flash()->success('success', $student->fullname.' Banned');
            return back();
        }
        flash()->error('error', $student->fullname.' Could not be ban');
        return back();
    }

    public function unbanstudent($id){
        $student = Student::onlyBanned()->find($id);
        //dd($student);
        if ($student->isBanned()){
            $student->unban([
                'comment' => 'Enjoy your ban!',
            ]);
            flash()->success('success', $student->fullname.' UnBanned');
            return back();
        }
        flash()->error('error', $student->fullname.' Could not be ban');
        return back();
    }

    public function enrolledCourses($id){
        $enrolledCourses = EnrolledCourse::where('student_id',$id);
        $student = Student::find($id);
        return view('admin.pages.students.enrolled.index',compact('enrolledCourses','student'));
    }

    public function enrolledChart($id){

    }

}
