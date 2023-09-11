<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('viewTeacher', User::class);
        $teachers = User::where('role_id', 2)->get();
        return view('teachers.index', compact('teachers'));
    }
    public function store()
    {
        $this->authorize('addTeacher',User::class);
        //TODO: Implement Store method
        return view('teachers.index')->with('success', 'Teacher Successfully Added');
    }
}
