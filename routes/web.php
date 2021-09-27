<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCourse;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Guest Routes
Route::get('/', function () {
    return redirect('/home');
});
Route::view('/home','index');
Route::get("/dashboard",[DashboardController::class,"index"])->name("Dashboard");
Route::get("/courses",[DashboardController::class,"courses"])->name("courses");
Route::post("/course_add",[DashboardController::class,"course_add"])->name("course_add");

//Controllers for Registration and Login
Route::get("/login",[LoginController::class,"index"])->name("Login");
Route::post("/log",[LoginController::class,"login"])->name("On-Login");
Route::get("/register",[RegisterController::class,"index"])->name("Register");
Route::post("/register/store",[RegisterController::class,"store"]);
Route::post("/logout",[LogoutController::class,"logout"])->name("Logout");

//student controllers 
Route::middleware('auth')->group(function(){
    Route::get("/course_selection",[DashboardController::class,"course_selection"])->name("course_selcetion");
    Route::get("/user/profile",[ProfileController::class,"index"])->name("Profile");
    Route::post("/user/profile/store",[ProfileController::class,"updateProfile"])->name("On-Update");
});


// Admin session
Route::middleware('admin')->group(function(){
    Route::get("/admin/index",[AdminController::class,"index"])->name("Admin");
    Route::get('/admin/course', [AdminController::class, 'course'])->name('course');
    Route::get('/admin/type', [AdminController::class, 'courseType'])->name('courseType');
    Route::get('/addtype', [AdminController::class, 'displayType'])->name('DisplayType');
    Route::post('/addtype',[AdminController::class,'addtype'])->name('AddCourseType');
    Route::get('/admin/type/delete{id}', [AdminController::class, 'delete'])->name('deleteType');
    Route::get('/admin/type/update{id}', [AdminController::class, 'displayCourseType'])->name('displayType');
    Route::post('/admin/type/update', [AdminController::class, 'updateType'])->name('updateType');
    Route::get('/admin/selection', [AdminController::class, 'courseSelection'])->name('courseSelection');
    Route::get('/admin/course/update{id}', [AdminController::class, 'displayCourse'])->name('displayCourse');
    Route::post('/admin/course/update',[AdminController::class,'updateCourse'])->name('updateCourse');
    Route::resource('admincourse', AdminCourse::class);
    Route::get('/admin/course/delete{id}', [AdminController::class, 'delete'])->name('deleteCourse');

});
