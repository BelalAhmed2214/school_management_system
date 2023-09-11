@extends('layouts.app')

@section('title', 'Teacher Profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Teacher Profile') }}</div>

                    <div class="card-body">
                            <!-- Display profile info for the authenticated user -->
                            <p>Name: {{$user->first_name." ".$user->last_name}}</p>
                            <p>Email: {{$user->email }}</p>
                            <p>Role: {{$user->role->name}}</p>
                            <!-- Include additional profile fields as needed -->

                            <!-- Add an edit button to allow the user to update their profile -->
                            <a href="#" class="btn btn-primary">Edit Profile</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
