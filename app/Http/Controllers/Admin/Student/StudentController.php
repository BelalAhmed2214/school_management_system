<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $this->authorize('viewStudent', User::class);
        $students = User::where('role_id', 3)->get();
        return view('admin.students.index', compact('students'));
    }
    public function create()
    {
        $this->authorize('addStudent', User::class);
        return view('admin.students.create');
    }
    public function store(StoreStudentRequest $request)
    {
        $this->authorize('addStudent',User::class);

        $student = new User();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = bcrypt($request->input('password'));
        $student->role_id = 3;
        $student->save();

        return redirect()->route('admin.students.index')->with('success', 'Student Successfully Added');
    }
    public function edit(User $student)
    {
        $this->authorize('editStudent', User::class);

        return view('admin.students.edit',compact('student'));
    }
    public function update(UpdateStudentRequest $request, User $student)
    {
        $this->authorize('editStudent', User::class);

        $student->name = $request->input('name');
        $student->email = $request->input('email');

        if ($request->filled('password')) {
            $student->password = bcrypt($request->input('password'));
        }
        $student->save();

        return redirect()->route('admin.students.index')->with('success', 'Student successfully updated');
    }
    public function destroy(User $student)
    {
        $this->authorize('deleteStudent', User::class);
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Student successfully deleted');
    }
}
