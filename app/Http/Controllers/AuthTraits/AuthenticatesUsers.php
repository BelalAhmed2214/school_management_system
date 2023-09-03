<?php

namespace App\Http\Controllers\AuthTraits;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait AuthenticatesUsers
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    protected function authenticate($user, $remember = false)
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
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
