<?php

use App\Http\Controllers\Admin\Course\CourseController as AdminCourseController;
use App\Http\Controllers\Student\Course\CourseController as StudentCourseController;
use App\Http\Controllers\Admin\Student\StudentController;
use App\Http\Controllers\Admin\Teacher\TeacherController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teacher\Assignment\Exam\ExamController as TeacherExamController;
use App\Http\Controllers\Student\Exam\ExamController as StudentExamController;
use App\Http\Controllers\Teacher\Assignment\Task\TaskController;
use App\Http\Controllers\Student\Task\TaskController as StudentTaskController;
use App\Http\Controllers\Teacher\Result\Task\TaskResultController;
use App\Http\Controllers\Teacher\Result\Exam\ExamResultController;
use App\Http\Controllers\Teacher\Lecture\LectureController as TeacherLectureController;
use App\Http\Controllers\Student\Lecture\LectureController as StudentLectureController;
use App\Http\Controllers\UserController;
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
Route::group(['prefix' => 'admin' ,'as'=>'admin.'], function () {
    Route::resources([
        'teacher'=>TeacherController::class,
        'student'=>StudentController::class,
        'course'=>AdminCourseController::class
    ]);
});
############### End Admin ##############################

############## Start Student ###########################
Route::group(['prefix' => 'student','as'=>'student.'], function () {

    Route::resources([
        'course'=>StudentCourseController::class,
        'exam'=>StudentExamController::class,
        'lecture'=>StudentLectureController::class,
        'task'=>StudentTaskController::class,
    ]);

});
############## End Student #############################
############# Start Teacher #############################
Route::group(['prefix' => 'teacher','as'=>'teacher.'], function () {
    Route::resources([
        'lecture'=>TeacherLectureController::class,
        'exam'=>TeacherExamController::class,
        'task'=>TaskController::class,
        'examResult'=> ExamResultController::class,
        'taskResult'=> TaskResultController::class,
    ]);
});
############# End Teacher ##############################
});


