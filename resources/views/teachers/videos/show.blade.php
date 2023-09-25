@extends('layouts.app')

@section('title', 'View Video')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>View Video</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title"><h5>Video Title:</h5></label>
                    <p>{{ $video->title }}</p>
                </div>

                <div class="form-group">
                    <label for="description"><h5>Video Description:</h5></label>
                    <p>{{ $video->description }}</p>
                </div>

                <div class="form-group">
                    <label for="video"><h5>Video Path:</h5></label>
                    <p>{{ $video->path }}</p>
                </div>

                <div class="form-group">
                    <label for="course"><h5>Course:</h5></label>
                    <p>{{ $video->course->name }}</p>
                </div>

                <div class="form-group">
                    <a href="{{ route('teacher.video.edit', $video) }}" class="btn btn-primary mr-1">Edit Video</a>
                    <form action="{{ route('teacher.video.destroy', $video) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Video</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
