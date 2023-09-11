<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{


    public function profile()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $roleFolder = $this->getRoleFolder($user->role_id);
        return view('profile.index',compact('user'));
    }
    public function getRoleFolder($roleId)
    {
        if ($roleId == 1) {
            return 'Admin';
        } elseif ($roleId == 2) {
            return 'Teacher';
        } elseif ($roleId == 3) {
            return 'Student';
        }
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('profile.edit',compact('user'));
    }
    public function updateProfile(Request $request, User $user)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update the user's name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Save the changes
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile Successfully Updated');
    }


}
