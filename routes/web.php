<?php

use App\Http\Controllers\Admin\Course\CourseController as AdminCourseController;
use App\Http\Controllers\Student\Course\CourseController as StudentCourseController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teacher\LectureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Teacher\TeacherController;
use App\Http\Controllers\Admin\Student\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/welcome',function(){
    return view('welcome');
});

######## Start Login System #####################################
Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[loginController::class,'logout'])->name('logout');
###### End Login System ##########################################


###### Start Password Reset ###########################
// Show the password reset request form
Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');

// Handle the password reset request
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');

// Show the password reset form with a token
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');

// Handle the password reset
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');

###### End Password Reset ##############################

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', function () {
        return redirect()->route('profile.index');
    });

############ Start profile ###############################
Route::group(['middleware'=>'auth','as'=>'profile.'],function (){

    Route::get('/Profile', [UserController::class,'profile'])->name('index');
    Route::get('/Profile/edit', [UserController::class,'editProfile'])->name('edit');
    Route::post('/Profile/{user}', [UserController::class,'updateProfile'])->name('update');
});
############ End profile ################################
############### Start Admin ##############################
Route::group(['middleware'=>'auth','prefix' => 'admin', 'namespace' => 'Admin' ,'as'=>'admin.'], function () {

    Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('teachers', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('teachers/edit/{teacher}', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');


    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('students', [StudentController::class, 'store'])->name('students.store');
    Route::get('students/edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

    Route::get('courses', [AdminCourseController::class,'index'])->name('courses.index');
    Route::get('courses/create',[AdminCourseController::class,'create'])->name('courses.create');
    Route::post('courses',[AdminCourseController::class,'store'])->name('courses.store');

});
############### End Admin ##############################

############## Start Student ###########################
Route::group(['middleware'=>'auth','prefix' => 'student', 'namespace' => 'Student' ,'as'=>'student.'], function () {
    Route::get('courses', [StudentCourseController::class,'index'])->name('courses.index');
    Route::get('courses/register', [StudentCourseController::class,'create'])->name('courses.create');
    Route::post('courses',[StudentCourseController::class,'store'])->name('courses.store');
});
############## End Student #############################
############# Start Teacher #############################
Route::group(['middleware'=>'auth','prefix' => 'teacher', 'namespace' => 'Teacher' ,'as'=>'teacher.'], function () {
    Route::get('lectures',[LectureController::class,'viewLectures'])->name('lectures.index');
});

############# End Teacher ##############################
});


