<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function authenticate($user, $remember = false)
    {
        auth()->login($user, $remember); // Manually log in the user with "Remember Me" option
    }

    public function login(Request $request)
    {
        $inputs = $request->only('email','password');
        $remember = $request->has('remember'); // Check if "Remember Me" is checked
        $user = User::where('email',$inputs['email'])->first();
        if (!$user || !password_verify($inputs['password'], $user->password)) {
            return redirect()->route('login')->withErrors(['email' => 'Invalid Inputs']);
        }
        else {
            $this->authenticate($user,$remember);
            return redirect()->route('home');
        }
    }
}
