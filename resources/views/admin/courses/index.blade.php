@extends('layouts.app')

@section('title', 'Course List')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div>
            <a href="{{ route('admin.courses.create') }}" class="btn btn-success">Add Course</a>
        </div>
        <br>
        <div class="card-header">{{ __('Courses') }}</div>

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
                            @foreach ($course->users as $user)
                                @if ($user->role_id === 2) <!-- Check if the user is an instructor -->
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
                            <a href="#" class="btn btn-primary">Edit</a>
                            <form action="#" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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
