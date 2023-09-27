<?php

namespace App\Http\Controllers\Teacher\Assignment\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Course;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewExams',User::class);

        $exams = Exam::all();
        return view('teachers.assignments.exams.index',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $courses = Course::where('user_id',$user->id)->get();
        return view('teachers.assignments.exams.create',compact('courses'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        // Create a new Exam instance and set its attributes
        $exam = new Exam();
        $exam->title = $request->input('title');
        $exam->description = $request->input('description');
        $exam->duration = $request->input('duration');
        $exam->course_id = $request->input('course_id');
        $exam->user_id = Auth::id();

        // Save the new exam to the database
        $exam->save();

        // Redirect back with a success message
        return redirect()->route('teacher.exam.index')->with('success', 'Exam created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        return view('teachers.assignments.exams.show',compact('exam'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        $user = Auth::user();
        $courses = Course::where('user_id',$user->id)->get();
        return view('teachers.assignments.exams.edit',compact('courses','exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $exam->title = $request->input('title');
        $exam->description = $request->input('description');
        $exam->duration = $request->input('duration');
        $exam->course_id = $request->input('course_id');
        $exam->user_id = Auth::id();

        // Save the new exam to the database
        $exam->save();

        return redirect()->route('teacher.exam.index')->with('success', 'Exam Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('teacher.exam.index')->with('success', 'Exam Deleted successfully');
    }
}
