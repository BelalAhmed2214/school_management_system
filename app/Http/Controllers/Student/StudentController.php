<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;

class StudentController extends Controller
{
    public function chooseCourse()
    {
        $courses = Course::all();
        $instructors = User::where('role_id',2)->get();
        return view('students.courses.enroll',compact('courses','instructors'));
    }
    //TODO: Implement EnrollCourse function
}
