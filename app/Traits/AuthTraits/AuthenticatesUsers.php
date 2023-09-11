<?php

namespace App\Traits\AuthTraits;

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
        $inputs = $request->only('email', 'password','role');
        $remember = $request->has('remember');

        // Find the user by email
        $user = User::where('email', $inputs['email'])->first();

        if (!$user || !password_verify($inputs['password'], $user->password)) {
            return redirect()->route('login')->withErrors(['email' => 'Invalid Inputs']);
        }


        // Authenticate the user and redirect based on role
        $this->authenticate($user, $remember);
        return redirect()->route('profile.index'); // Redirect to a default page if role is not recognized

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
