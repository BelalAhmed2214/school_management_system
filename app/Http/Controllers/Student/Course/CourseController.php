<?php

namespace App\Http\Controllers\Student\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Exam;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewEnrolledCourses',User::class);
        $student = Auth::user();
        $courses=$student->courses;
        return view('students.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('registerCourse',User::class);
        $courses = Course::all();
        $instructors = User::where('role_id',2)->get();
        return view('students.courses.create',compact('courses','instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('registerCourse',User::class);

        $user = auth()->user(); // Get the currently authenticated user
        // Retrieve the selected course and instructor
        $courseId = $request->input('course');
        $instructorId = $request->input('user_id');

        // Check if the user is already enrolled in this course
        if ($user->courses()->where('courses.id', $courseId)->exists()){
            return redirect()->route('student.course.index')->with('error', 'You are already enrolled in this course');
        }

        $course = Course::find($courseId);
        // Check if the instructor is related to this course
        if (!$course->users()->where('users.id', $instructorId)->exists()) {
            return redirect()->route('student.course.index')->with('error', 'Selected instructor is not related to this course');
        }

        // Enroll the user in the selected course
        $user->courses()->attach($courseId);

        return redirect()->route('student.course.index')->with('success', 'Course successfully Registered');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $lectures = Lecture::where('course_id', $course->id)->get();
        $exams = Exam::where('course_id', $course->id)->get();
        $tasks = Task::where('course_id', $course->id)->get();
        return view('students.courses.show', compact(['lectures','tasks','exams']));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
