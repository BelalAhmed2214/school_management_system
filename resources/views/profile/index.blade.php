@extends('layouts.app')

@section('title')
    {{Auth::user()->role->name}}
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">

                    <div class="card-body">
                            <!-- Display profile info for the authenticated user -->
                            <p>Name: {{$user->name}}</p>
                            <p>Email: {{ $user->email }}</p>
                            <p>Role: {{$user->role->name}}</p>
                            <!-- Include additional profile fields as needed -->

                            <!-- Add an edit button to allow the user to update their profile -->
                            <a href="{{route('profile.edit')}}" class="btn btn-primary">Edit Profile</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
