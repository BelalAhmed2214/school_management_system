@extends('layouts.app')

@section('title', 'Show exam')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Show exam</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <p>{{ $exam->title }}</p>
                </div>
                <div class="form-group">
                    <label for="description">Content:</label>
                    <p>{{ $exam->description }}</p>
                </div>
                <div class="form-group">
                    <label for="course">Duration:</label>
                    <p>{{ $exam->duration }}</p>
                </div>

                <div class="form-group">
                    <label for="course">Course:</label>
                    <p>{{ $exam->course->name }}</p>
                </div>
                <div class="form-group">
                    <label for="created_at">Created At:</label>
                    <p>{{ $exam->created_at }}</p>
                </div>
{{--                <div class="form-group">--}}
{{--                    @can('editExams',\App\Models\User::class)--}}
{{--                    <a href="{{ route('teacher.exam.edit', $exam) }}" class="btn btn-primary mr-1">Edit exam</a>--}}
{{--                    @endcan--}}
{{--                    @can('deleteExams',\App\Models\User::class)--}}
{{--                    <form action="{{ route('teacher.exam.destroy', $exam) }}" method="POST" style="display: inline;"  onsubmit="return confirm('Are you sure you want to delete this exam?');">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-danger">Delete exam</button>--}}
{{--                    </form>--}}
{{--                    @endcan--}}
{{--                </div>--}}

            </div>
        </div>
    </div>


@endsection
