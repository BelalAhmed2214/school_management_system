<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewTeachers', User::class);
        $teachers = User::where('role_id', 2)->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('addTeacher',User::class);
        $teachers = User::where('role_id', 2)->get();

        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $this->authorize('addTeacher',User::class);

        $teacher = new User();
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->password = bcrypt($request->input('password'));
        $teacher->role_id = 2;
        $teacher->save();

        return redirect()->route('admin.teacher.index')->with('success', 'Teacher Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*

         TODO:Implement Address and phoneNumber(multivalued) for Teacher and The courses
            that the Teacher teached it.
         */

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $teacher)
    {
        $this->authorize('editTeacher',User::class);

        return view('admin.teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, User $teacher)
    {
        $this->authorize('editTeacher',User::class);

        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');

        if ($request->filled('password')) {
            $teacher->password = bcrypt($request->input('password'));
        }
        $teacher->save();

        return redirect()->route('admin.teacher.index')->with('success', 'Teacher successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teacher)
    {
        $this->authorize('deleteTeacher',User::class);

        $teacher->delete();
        return redirect()->route('admin.teacher.index')->with('success', 'Teacher successfully deleted');

    }
}
