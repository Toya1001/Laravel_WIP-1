<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StudentSelection;
use App\Models\Course;
use App\Models\TypesOfCourse;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $students = User::all()->count();
        $approved= StudentSelection::where('is_approved',1)->count();
        $course=Course::all()->count();
        $category=TypesOfCourse::all()->count();
        $recent=StudentSelection::orderby('id','desc')->get();

        return view('admin.index',compact('students', 'approved', 'course','category', 'recent'));
    }
    public function course(){
        $courses=DB::table('courses')
        ->join('types_of_courses', 'courses.course_type_id', 'types_of_courses.id')
        ->select('courses.id', 'courses.course_name', 'types_of_courses.course_type')->get();
        return view('admin.course', compact('courses'));
        
    }

    public function displayCourse($id){
        $courses = DB::table('courses')
        ->join('types_of_courses', 'courses.course_type_id', 'types_of_courses.id')
        ->where('courses.id', $id)->select('courses.id', 'courses.course_name', 'types_of_courses.course_type', 'types_of_courses.id as type_id')->first();
        $types=TypesOfCourse::all();
        return view('admin.updateCourse', compact('types', 'courses'));
    }

    public function updateCourse(Request $request)
    {
        $id = $request->course_id;

        // dd($id);            
        Course::find($id)->update([
            'course_name' => $request->course_name,
            'course_type_id' =>$request->course_type]);

        return redirect()->back()->with('update_status', 'Update Successful');
    }

    public function delete($id){
        $course=Course::find($id);
        $course->delete();

        return redirect()->back()->with('update_status', 'Course deleted!');
    }

    public function courseType(){
        $types=TypesOfCourse::all();
        // dd($types);
        return view('admin.courseType', compact('types'));
    }

    public function displayType()
    {
    
        return view('admin.addcourseType');
    }
    public function addtype(Request $request){
        $this->validate($request,[
            'coursetype_id' => 'required | unique:types_of_courses,id',
            'coursetype'=>'required | unique:types_of_courses,course_type',
            'desc'=>'required | unique:types_of_courses,desc'
        ]);

        TypesOfCourse::create([
            'id'=>$request->coursetype_id,
            'course_type'=>$request->coursetype,
            'desc'=>$request->desc
        ]);

        return redirect()->back();
    }
    public function courseSelection(){
        // $student = DB::table('student_selections')
        //     ->join('users', 'users.id','=', 'student_selections')
        //     ->get();
        
        return view('admin.courseSelection');
    }

    public function deleteType($id)
    {
        $types = Course::find($id);
        $types->delete();

        return redirect()->back()->with('update_status', 'Course deleted!');
    }

    public function updateType(Request $request)
    {
        $id = $request->type_id;
        // dd($id);

        TypesOfCourse::find($id)->update([
            'course_type' => $request->type_name,
            'desc' => $request->type_desc
        ]);

        return redirect()->back()->with('update_status', 'Update Successful');
    }

    public function displayCourseType($id)
    {
        $types = TypesOfCourse::find($id);
        // dd($types);
        return view('admin.updateType', compact('types'));
    }

    public function selection(){
        StudentSelection::all();

    }
}
