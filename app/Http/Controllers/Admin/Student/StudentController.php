<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewStudents', User::class);
        $students = User::where('role_id', 3)->get();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('addStudent', User::class);
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $this->authorize('addStudent',User::class);

        $student = new User();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = bcrypt($request->input('password'));
        $student->role_id = 3;
        $student->save();

        return redirect()->route('admin.student.index')->with('success', 'Student Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*
         TODO:Implement Address and phoneNumber(multivalued) for Student and The courses
            that the Student Enrolled in it.
        */
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $student)
    {
        $this->authorize('editStudent', User::class);

        return view('admin.students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, User $student)
    {
        $this->authorize('editStudent', User::class);

        $student->name = $request->input('name');
        $student->email = $request->input('email');

        if ($request->filled('password')) {
            $student->password = bcrypt($request->input('password'));
        }
        $student->save();

        return redirect()->route('admin.student.index')->with('success', 'Student successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $student)
    {
        $this->authorize('deleteStudent', User::class);
        $student->delete();
        return redirect()->route('admin.student.index')->with('success', 'Student successfully deleted');
    }
}
