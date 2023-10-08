<?php

namespace App\Http\Controllers\Student\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $this->authorize('viewStudentExams',User::class);
//        $exams = Exam::all();
//        return view('students.exams.index',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        return view('students.exams.show',compact('exam'));

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
