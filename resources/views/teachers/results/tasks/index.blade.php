@extends('layouts.app')

@section('title', 'task Results')

@section('content')
    <div class="container">
        <div>
            <a href="{{route('teacher.taskResult.create')}}" class="btn btn-success">Add Task Result</a>
        </div>
        <br>
        <div class="card-header">
            <h4 style="padding-top: 10px;">All tasks Results</h4>
        </div>
        <br>

        {{--        @if (count($taskResults) > 0)--}}
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Degree</th>
                <th>task ID</th>
                <th>Student</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($taskResults as $result)
                <tr>
                    <td>{{$result->id}}</td>
                    <td>{{$result->degree}}</td>
                    <td>{{$result->task_id}}</td>
                    <td>{{$result->user_id}}</td>
                    <td>
                        {{-- Add actions like edit and delete buttons --}}
                        <a href="{{ route('teacher.taskResult.edit', $result->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('teacher.taskResult.destroy', $result->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--        @else--}}
        {{--            <p>No task results found.</p>--}}
        {{--        @endif--}}
    </div>
@endsection
