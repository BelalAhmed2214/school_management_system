<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewCourses',User::class);
        $courses = Course::with('users')->get();
        // Fetch all instructors (role_id = 2) and students (role_id = 3) for each course
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('addCourse',User::class);


        $users = User::where('role_id',2)->get();
        return view('admin.courses.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $this->authorize('addCourse',User::class);

        // Create a new course record
        $course = new Course();
        $course->name = $request->input('name');
        $course->user_id = $request->input('user_id');
        // Save the course to the database
        $course->save();

        // Attach the selected instructor(s) to the course
        $instructorId = $request->input('user_id');
        $course->users()->attach($instructorId);

        // Redirect the user to the course index page with a success message
        return redirect()->route('admin.course.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $this->authorize('editCourse',User::class);
        $users = User::where('role_id',2)->get();
        return view('admin.courses.edit',compact('course','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->authorize('editCourse',User::class);

        $course->name = $request->input('name');
        $course->user_id = $request->input('user_id');
        $course->save();

        return redirect()->route('admin.course.index')->with('success', 'Course successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $this->authorize('deleteCourse',User::class);
        $course->delete();
        return redirect()->route('admin.course.index')->with('success', 'Course successfully deleted');

    }
}
