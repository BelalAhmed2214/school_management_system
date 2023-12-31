@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="container">
        <div class="card-header">
            <h4>Add Student</h4>
        </div>
        <br>

        <form method="POST" action="{{route('admin.student.store')}}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
