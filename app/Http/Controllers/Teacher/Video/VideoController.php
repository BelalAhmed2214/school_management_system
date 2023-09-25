<?php

namespace App\Http\Controllers\Teacher\Video;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Course;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewVideos',User::class);
        $videos = Video::all();
        return view('teachers.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('teachers.videos.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
        // Save the video file to the storage with a unique filename
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoPath = 'videos/';

            // Generate a unique filename based on title, timestamp, and a random string
            $originalFilename = pathinfo($videoFile->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueFilename = Str::slug($originalFilename) . '_' . time() . '_' . Str::random(10) . '.' . $videoFile->getClientOriginalExtension();

            // Store the file with the unique filename
            $videoFile->storeAs($videoPath, $uniqueFilename, 'public');
        }

            // Create a new Video model and store video details in the database
            $video = new Video();
            $video->title = Str::slug($request->input('title'));
            $video->description = $request->input('description');
            $video->path = $uniqueFilename;
            $video->user_id = auth()->id();
            $video->course_id = $request->input('course_id');
            $video->save();
        return redirect()->route('teacher.video.index')->with('success', 'Video uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return view('teachers.videos.show',compact('video'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        $courses = Course::all(); // Assuming you have a Course model
        return view('teachers.videos.edit', compact('video', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        // Update the video details
        $video->title = Str::slug($request->input('title'));
        $video->description = $request->input('description');
        $video->course_id = $request->input('course_id');

        // Check if a new video file is uploaded
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoPath = 'videos/';

            // Generate a unique filename based on title, timestamp, and a random string
            $originalFilename = pathinfo($videoFile->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueFilename = Str::slug($originalFilename) . '_' . time() . '_' . Str::random(10) . '.' . $videoFile->getClientOriginalExtension();

            // Store the new file with the unique filename
            $videoFile->storeAs($videoPath, $uniqueFilename, 'public');

            // Delete the old video file if it exists
            if (Storage::disk('public')->exists($video->path)) {
                Storage::disk('public')->delete($video->path);
            }

            // Update the video's path to the new filename
            $video->path = $uniqueFilename;
        }

        // Save the updated video details
        $video->save();

        return redirect()->route('teacher.video.index')->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        // Delete the video file from storage
        if (Storage::disk('public')->exists($video->path)) {
            Storage::disk('public')->delete($video->path);
        }

        // Delete the video record from the database
        $video->delete();

        return redirect()->route('teacher.video.index')->with('success', 'Video deleted successfully.');
    }
}
