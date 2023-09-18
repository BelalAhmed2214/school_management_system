<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $this->authorize('viewTeacher', User::class);
        $teachers = User::where('role_id', 2)->get();
        return view('admin.teachers.index', compact('teachers'));
    }
    public function create()
    {
        $this->authorize('addTeacher',User::class);
        $teachers = User::where('role_id', 2)->get();

        return view('admin.teachers.create');
    }
    public function store(StoreTeacherRequest $request)
    {
        $this->authorize('addTeacher',User::class);

        $teacher = new User();
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->password = bcrypt($request->input('password'));
        $teacher->role_id = 2;
        $teacher->save();

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher Successfully Added');
    }

    public function edit(User $teacher)
    {
        $this->authorize('editTeacher',User::class);

        return view('admin.teachers.edit',compact('teacher'));
    }
    public function update(UpdateTeacherRequest $request, User $teacher)
    {
        $this->authorize('editTeacher',User::class);

        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');

        if ($request->filled('password')) {
            $teacher->password = bcrypt($request->input('password'));
        }
        $teacher->save();

        return redirect()->route('admin.teachers.index')->with('success', 'Student successfully updated');
    }
    public function destroy(User $teacher)
    {
        $this->authorize('deleteTeacher',User::class);

        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher successfully deleted');

    }


}
