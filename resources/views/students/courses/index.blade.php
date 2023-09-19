@extends('layouts.app')

@section('title', 'Course List')

@section('content')


    <div class="container">
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
        <div class="card-header">{{ __('Enrolled Courses') }}</div>

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
                    <?php $i=0 ?>

                @foreach ($courses as $course)
                        <?php $i++ ?>

                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $course->name }}</td>

                        <td>
                            @foreach($course->users as $user)
                                @if ($user->role_id === 2)
                                    {{ $user->name }}
                                    @if (!$loop->last)
                                        <br> <!-- Add a line break if it's not the last instructor -->
                                    @endif
                                @endif
                            @endforeach
                        </td>

                        <td>{{ $course->created_at }}</td>
                        <td>
                            <!-- Add your actions here, like view, edit, delete buttons -->
                            <a href="#" class="btn btn-info">View</a>

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
