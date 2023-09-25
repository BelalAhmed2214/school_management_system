<?php

namespace App\Http\Controllers\Teacher\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Course;
use App\Models\task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewTasks',User::class);

        $tasks = Task::all();
        return view('teachers.tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $courses = Course::where('user_id',$user->id)->get();
        return view('teachers.tasks.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        // Create a new task instance and set its attributes
        $task = new task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->duration = $request->input('duration');
        $task->course_id = $request->input('course_id');
        $task->user_id = Auth::id();

        // Save the new task to the database
        $task->save();

        // Redirect back with a success message
        return redirect()->route('teacher.task.index')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
