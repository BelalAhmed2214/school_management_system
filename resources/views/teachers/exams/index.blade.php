@extends('layouts.app')

@section('title', 'All Exams')

@section('content')
    <div class="container">
        <div>
            <a href="#" class="btn btn-success">Add Exam</a>
        </div>
        <br>
        <div class="card-header">
            <h4>All Exams</h4>
        </div>
        <br>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
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

                    @foreach ($exams as $exam)
                            <?php $i++ ?>

                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $exam->title }}</td>
                            <td>{{ $exam->description }}</td>
                            <td>{{ $exam->duration }}</td>
                            <td>{{ $exam->course->name }}</td>
                            <td>{{ $exam->user->name }}</td>
                            <td>{{ $exam->created_at }}</td>
                            <td>
                                <a href="{{ route('exam.show', $exam) }}" class="btn btn-info">View</a>
                                <a href="{{ route('exam.edit', $exam) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('exam.destroy', $exam) }}" method="POST" style="display: inline;">
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
