<?php

namespace App\Http\Controllers\Student\Course;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CourseController extends Controller
{

    public function index()
    {
        $this->authorize('viewEnrolledCourses',User::class);
        $student = Auth::user();
        $courses=$student->courses;
        $instructors = User::where('role_id',2)->first();

        return view('students.courses.index', compact('courses','instructors'));
    }
    public function create()
    {
        $courses = Course::all();
        $instructors = User::where('role_id',2)->get();
        return view('students.courses.create',compact('courses','instructors'));
    }
    public function store(Request $request)
    {
        $user = auth()->user(); // Get the currently authenticated user

        // Retrieve the selected course and instructor
        $courseId = $request->input('course');
        $instructorId = $request->input('user_id');

        // Check if the user is already enrolled in this course
        if ($user->courses()->where('courses.id', $courseId)->exists()){
            return redirect()->route('student.courses.index')->with('error', 'You are already enrolled in this course');
        }

        $course = Course::find($courseId);
        // Check if the instructor is related to this course
        if (!$course->users()->where('users.id', $instructorId)->exists()) {
            return redirect()->route('student.courses.index')->with('error', 'Selected instructor is not related to this course');
        }

        // Enroll the user in the selected course
        $user->courses()->attach($courseId);

        return redirect()->route('student.courses.index')->with('success', 'Course successfully Registered');
    }


}
