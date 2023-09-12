<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Course\CourseController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

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

Route::get('/', function () {
    return view('auth/login');});
Route::get('/home',[HomeController::class,'index'])->name('home')->middleware('auth');
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
############ Start profile ###############################
Route::get('/Profile', [UserController::class,'profile'])->name('profile.index');
Route::get('/Profile/edit', [UserController::class,'editProfile'])->name('profile.edit');
Route::post('/Profile/{user}', [UserController::class,'updateProfile'])->name('profile.update');
############ End profile ################################
############### Start Admin ##############################
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('teachers', [AdminController::class, 'teachers'])->name('teachers.index');
    Route::get('courses', [CourseController::class,'index'])->name('admin.courses.index');
    Route::post('courses',[CourseController::class,'store'])->name('admin.courses.store');
    Route::get('courses/create',[CourseController::class,'create'])->name('admin.courses.create');
    Route::get('students', [AdminController::class, 'students'])->name('admin.students.index');

});
############### End Admin ##############################

############## Start Student ###########################
Route::group(['prefix' => 'student', 'namespace' => 'Student'], function () {
    Route::get('courses/choose', [StudentController::class,'chooseCourse'])->name('student.courses.choose');
    //TODO: implement Store Route to Make Student Enroll in a course
});
############## End Student #############################




