@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="container">
        <div>
            <a href="{{route('teacher.task.create')}}" class="btn btn-success">Add Task</a>
        </div>
        <br>
        <div class="card-header">
            <h4>All tasks</h4>
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

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>Course</th>
                        <th>Published by</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0 ?>

                    @foreach ($tasks as $task)
                            <?php $i++ ?>

                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->duration }}</td>
                            <td>{{ $task->course->name }}</td>
                            <td>{{ $task->user->name }}</td>
                            <td>
                                <a href="{{ route('teacher.task.show', $task) }}" class="btn btn-info">View</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
