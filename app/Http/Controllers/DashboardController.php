<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\StudentSelection;

use App\Models\TypesOfCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        return view("auth.dashboard");

    }
    public function course_selection() {

        session()->put('course','selected');

        $courses = Course::all();

        return view('admin.courseSelection', ['courses' => $courses])->with('course','selected');

    }

    public function course_add(Request $request)
    {
      
        StudentSelection::create([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
            'enroll_dt' => now(),
            'is_approved' => 0,
        ]);

        $msg = "<script>
        alertify.set('notifier','position', 'top-right');
        alertify.success('Successfully Applied');
        </script>";
        return redirect()->route('Dashboard')->with(['success'=>$msg]);
    }
    public function courses(){
        $courses=Course::with('TypesOfCourses')->get();
        return view('courses',[
            'courses'=>$courses,
        ]);
    }
}
