@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="container">
        <div class="card-header">
            <h4>Edit Course</h4>
        </div>
        <br>

        <form method="POST" action="{{ route('admin.course.update', $course) }}">
            @csrf
            @method('PUT') <!-- Use the PUT method for updating -->

            <div class="form-group">
                <label for="name">Course</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
            </div>

            <div class="form-group">
                <label for="user_id">Instructor</label>
                <select id="user_id" name="user_id" class="form-control" required>
                    <option value="">Select an Instructor</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id === $course->user_id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->role->name }})
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
@endsection
