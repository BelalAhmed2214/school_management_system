<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function teachers()
    {
        $this->authorize('viewTeacher', User::class);
        $teachers = User::where('role_id', 2)->get();
        return view('teachers.index', compact('teachers'));
    }
    public function students()
    {
//        $this->authorize('viewStudent', User::class);
        $students = User::where('role_id', 3)->get();
        return view('students.index', compact('students'));
    }
    public function store()
    {
        $this->authorize('addTeacher',User::class);

        return view('teachers.index')->with('success', 'Teacher Successfully Added');
    }
}
