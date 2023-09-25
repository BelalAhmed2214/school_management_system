@extends('layouts.app')

@section('title', 'Show Lecture')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Show Lecture</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <p>{{ $lecture->title }}</p>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <p>{{ $lecture->content }}</p>
                </div>
                <div class="form-group">
                    <label for="course">Course:</label>
                    <p>{{ $lecture->course->name }}</p>
                </div>
                <div class="form-group">
                    <label for="course">File:</label>
                    <iframe src="{{ asset('documents/' . $lecture->doc) }}" width="100%" height="500px"></iframe>
                </div>
                <div class="form-group">
                    <label for="created_at">Created At:</label>
                    <p>{{ $lecture->created_at }}</p>
                </div>
                <div class="form-group">
                    <a href="{{ route('teacher.lecture.edit', $lecture) }}" class="btn btn-primary mr-1">Edit Lecture</a>
                    <form action="{{ route('teacher.lecture.destroy', $lecture) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Lecture</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
