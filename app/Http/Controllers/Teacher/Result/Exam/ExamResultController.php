<?php

namespace App\Http\Controllers\Teacher\Result\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamResultRequest;
use App\Http\Requests\UpdateExamResultRequest;
use App\Models\ExamResult;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examResults = ExamResult::all();
        return view('teachers.results.exams.index',compact('examResults'));
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
    public function store(StoreExamResultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamResult $examResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamResult $examResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamResultRequest $request, ExamResult $examResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamResult $examResult)
    {
        //
    }
}
