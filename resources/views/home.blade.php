@extends('layouts.app')
@section('title')
    Home Page
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <h1>Welcome to School Management System</h1>
                        <p>This is the home page of the school management system. You can customize this page as per your requirements.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
