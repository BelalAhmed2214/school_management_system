@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="container">
        <div>
            <a href="#" class="btn btn-success">Add Task</a>
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
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Course</th>
                        <th>Published by</th>
                        <th>Created At</th>
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
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->duration }}</td>
                            <td>{{ $task->course->name }}</td>
                            <td>{{ $task->user->name }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td>
                                <a href="{{ route('task.show', $task) }}" class="btn btn-info">View</a>
                                <a href="{{ route('task.edit', $task) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('task.destroy', $task) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
