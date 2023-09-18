@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <div class="container">
        <div class="card-header">
            <h4>Edit Student</h4>
        </div>
        <br>

        <form method="POST" action="{{route('admin.students.update',$student)}}">
            @csrf
            @method('PUT') <!-- Use the PUT method for updating -->

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
