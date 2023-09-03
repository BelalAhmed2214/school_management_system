<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

######## Start Login System #####################################
Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::get('/logout',[loginController::class,'logout'])->name('logout');
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

###### End Password Reset ###########################
