<?php

namespace App\Http\Controllers\Teacher\Lecture;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewLectures',User::class);
        $lectures = Lecture::all();
        return view('teachers.lectures.index',compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('addLecture',User::class);

        $user = Auth::user();
        $courses = Course::where('user_id',$user->id)->get();
        return view('teachers.lectures.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLectureRequest $request)
    {
        $this->authorize('addLecture',User::class);

        // Handle file upload if needed
        if ($request->hasFile('doc')) {
            $file = $request->file('doc');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Move the file to the desired directory
        }

        $lecture = new Lecture();
        $lecture->title = $request->input('title');
        $lecture->content = $request->input('content');
        $lecture->course_id = $request->input('course_id');
        $lecture->user_id = auth()->id();
        $lecture->doc = $filename;
        $file->move(public_path('documents/' . $lecture->id), $filename);

        $lecture->save();

        return redirect()->route('teacher.lecture.index')->with('success', 'Lecture added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture)
    {

        return view('teachers.lectures.show',compact('lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecture $lecture)
    {
        $this->authorize('editLecture',[User::class,$lecture]);
        $courses = Course::all();
        return view('teachers.lectures.edit',compact('lecture','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLectureRequest $request, Lecture $lecture)
    {
        $this->authorize('editLecture',[User::class,$lecture]);
        // Update the lecture fields
        $lecture->title = $request->input('title');
        $lecture->content = $request->input('content');
        $lecture->course_id = $request->input('course_id');

        // Handle file upload if a new file is provided
        if ($request->hasFile('doc')) {
            $file = $request->file('doc');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Move the new file to the public/documents directory
            $file->move(public_path('documents'), $filename);

            // Delete the old file if it exists
            if (!empty($lecture->doc)) {
                $oldFilePath = public_path('documents/' . $lecture->doc);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Update the lecture's doc field with the new file name
            $lecture->doc = $filename;
        }

        // Save the updated lecture
        $lecture->save();

        return redirect()->route('teacher.lecture.index')->with('success', 'Lecture updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecture $lecture)
    {
        $this->authorize('deleteLecture',[User::class,$lecture]);

        // Get the file path of the lecture's document
        $filePath = public_path('documents/' . $lecture->doc);



        // Delete the lecture from the database
        $lecture->delete();

        // Check if the file exists, and if it does, delete it
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        return redirect()->route('teacher.lecture.index')->with('success', 'Lecture Deleted successfully');
    }
}
