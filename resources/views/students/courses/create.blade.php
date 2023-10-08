@extends('layouts.app')

@section('title', 'Register Your Courses')

@section('content')
    <div class="container">
        <div class="card-header">
            <h4>Register a Course</h4>
        </div>
        <br>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{route('student.course.store')}}">
            @csrf

            <div class="form-group">
                <label for="course">Select a Course</label>
                <select id="course" name="course" class="form-control" required>
                    <option value="">Select a Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="instructor">Select an Instructor</label>
                <select id="user_id" name="user_id" class="form-control" required>
                    <option value="">Select an Instructor</option>
                    @foreach ($instructors as $instructor)
                        <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection



