@extends('layouts.app')

@section('title', 'All Exams')

@section('content')
    <div class="container">
        <div>
            <a href="{{route('teacher.exam.create')}}" class="btn btn-success">Add Exam</a>
        </div>
        <br>
        <div class="card-header">
            <h4>All Exams</h4>
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

                    @foreach ($exams as $exam)
                            <?php $i++ ?>

                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $exam->title }}</td>
                            <td>{{ $exam->duration }}</td>
                            <td>{{ $exam->course->name }}</td>
                            <td>{{ $exam->user->name }}</td>
                            <td>
                                <a href="{{ route('teacher.exam.show', $exam) }}" class="btn btn-info">View</a>
                                <a href="{{ route('teacher.exam.edit', $exam) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('teacher.exam.destroy', $exam) }}" method="POST" style="display: inline;">
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
