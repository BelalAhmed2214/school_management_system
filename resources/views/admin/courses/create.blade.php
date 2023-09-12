@extends('layouts.app')

@section('title', 'Create Course')

@section('content')
    <div class="container">
        <div class="card-header">
         <h4>Create Course</h4>
        </div>
        <br>


        <form method="POST" action="{{ route('admin.courses.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Course</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="user_id">Instructor</label>
                <select id="user_id" name="user_id" class="form-control" required>
                    <option value="">Select an Instructor</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{$user->role->name}})</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Create Course</button>
        </form>
    </div>
@endsection
