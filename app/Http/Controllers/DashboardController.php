<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\TypesOfCourse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        return view("auth.dashboard");

    }

    public function courses(){
        $courses=Course::with('TypesOfCourses')->get();
        return view('courses',[
            'courses'=>$courses,
        ]);
    }
}
