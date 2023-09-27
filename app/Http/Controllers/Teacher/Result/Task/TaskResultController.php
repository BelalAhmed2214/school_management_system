<?php

namespace App\Http\Controllers\Teacher\Result\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskResultRequest;
use App\Http\Requests\UpdateTaskResultRequest;
use App\Models\TaskResult;
use App\Models\User;

class TaskResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskResults = TaskResult::all();
        return view('teachers.results.tasks.index',compact('taskResults'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskResultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskResult $taskResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskResult $taskResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskResultRequest $request, TaskResult $taskResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskResult $taskResult)
    {
        //
    }
}
