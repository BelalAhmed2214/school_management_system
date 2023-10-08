@extends('layouts.app')

@section('title', 'Course List')

@section('content')
    <div class="container">
        @can('registerCourse', \App\Models\User::class)
            <div>
                <a href="{{ route('student.course.create') }}" class="btn btn-success">Submit Course</a>
            </div>
        @endcan
        <br>
        <div class="card-header">
            <span><h5>Enrolled Courses</h5></span>
        </div>
        <br>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (count($courses) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Instructor</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 0 ?>
                @foreach ($courses as $course)
                        <?php $i++ ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $course->name }}</td>
                        <td>
                            @foreach ($course->users as $user)
                                @if ($user->role_id === 2)
                                    {{ $user->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $course->created_at }}</td>
                        <td>
                            <a href="{{ route('student.course.show',$course->id)}}" class="btn btn-primary">View</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No courses available.</p>
        @endif
    </div>
@endsection
