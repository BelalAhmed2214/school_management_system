@extends('layouts.app')

@section('title', 'Show task')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Show task</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <p>{{ $task->title }}</p>
                </div>
                <div class="form-group">
                    <label for="description">Content:</label>
                    <p>{{ $task->description }}</p>
                </div>
                <div class="form-group">
                    <label for="course">Duration:</label>
                    <p>{{ $task->duration }}</p>
                </div>

                <div class="form-group">
                    <label for="course">Course:</label>
                    <p>{{ $task->course->name }}</p>
                </div>
                <div class="form-group">
                    <label for="created_at">Created At:</label>
                    <p>{{ $task->created_at }}</p>
                </div>
                <div class="form-group">
                    <a href="{{ route('teacher.task.edit', $task) }}" class="btn btn-primary mr-1">Edit task</a>
                    <form action="{{ route('teacher.task.destroy', $task) }}" method="POST" style="display: inline;"  onsubmit="return confirm('Are you sure you want to delete this exam?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
