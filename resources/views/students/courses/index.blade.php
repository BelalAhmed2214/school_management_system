@extends('layouts.app')

@section('title', 'Course List')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="card-header">{{ __('Courses') }}</div>

        @if (count($courses) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Instructor</th>
                    @if (Auth::user()->role->name === 'Admin')
                        <th>Students</th> <!-- Only show for Admin -->
                    @endif
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
                                {{ $user->name }}
                                @if (!$loop->last)
                                    <br> <!-- Add a line break if it's not the last instructor -->
                                @endif
                            @endforeach
                        </td>
                        @if (Auth::user()->role->name === 'Admin')
                            <td>
                                @foreach ($course->users as $user)
                                    {{ $user->name }}
                                    @if (!$loop->last)
                                        <br> <!-- Add a line break if it's not the last student -->
                                    @endif
                                @endforeach
                            </td>
                        @endif

                        <td>{{ $course->created_at }}</td>
                        <td>
                            <!-- Add your actions here, like view, edit, delete buttons -->
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;">
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
