@extends('layouts.app')

@section('title', 'Course List')

@section('content')


    <div class="container">
        <div>
            <a href="{{ route('admin.course.create') }}" class="btn btn-success">Add Course</a>
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
                            <a href="{{route('admin.course.show',$course)}}" class="btn btn-secondary">View</a>
                            <!-- Add your actions here, like view, edit, delete buttons -->
                            <a href="{{route('admin.course.edit',$course)}}" class="btn btn-primary">Edit</a>
                            <form action="{{route('admin.course.destroy',$course)}}" method="POST" style="display: inline;">
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
