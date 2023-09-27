@extends('layouts.app')

@section('title', 'Create Exam')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Create Exam</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('teacher.exam.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration (in minutes)</label>
                        <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="course_id">Course</label>
                        <select class="form-control" id="course_id" name="course_id" required>
                            <option value="">Select a Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Exam</button>
                </form>
            </div>
        </div>
    </div>
@endsection
