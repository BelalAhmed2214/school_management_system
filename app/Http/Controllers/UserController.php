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
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $roleFolder = $this->getRoleFolder($user->role_id);
        return view('profile.index',compact('user'));
    }
    function getRoleFolder($roleId)
    {
        if ($roleId == 1) {
            return 'Admin';
        } elseif ($roleId == 2) {
            return 'Teacher';
        } elseif ($roleId == 3) {
            return 'Student';
        }
    }
    public function updateProfile()
    {
        //TODO:Implement UpdateProfileMethod
    }
}
