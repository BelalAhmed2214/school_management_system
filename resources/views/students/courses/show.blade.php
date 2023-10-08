@extends('layouts.app')

@section('title', 'Data Course')

@section('content')
    <div class="container">
        <div class="card-header">
            <h4>Related Lectures for this Course</h4>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Published by</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0 ?>
                    @foreach ($lectures as $lecture)
                            <?php $i++ ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $lecture->title }}</td>
                            <td>{{$lecture->user->name}}</td>
                            <td>{{$lecture->course->name}}</td>
                            <td>
                                <a href="{{route('student.lecture.show',$lecture)}}" class="btn btn-primary mr-1">View</a>

                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="card-header">
            <h4>Related Exams for this Course</h4>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Duration</th>
                        <th>Course</th>
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
                            <td>{{$exam->description}}</td>
                            <td>{{$exam->duration}}</td>
                            <td>{{$exam->course->name}}</td>
                            <td>{{$exam->created_at}}</td>
                            <td>
                                <a href="{{ route('student.exam.show', $exam) }}" class="btn btn-info">View</a>

                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>

    <div class="container">
        <div class="card-header">
            <h4>Related Tasks for this Course</h4>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Duration</th>
                        <th>Course</th>
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
                            <td>{{$task->description}}</td>
                            <td>{{$task->duration}}</td>
                            <td>{{$task->course->name}}</td>
                            <td>{{$task->created_at}}</td>
                            <td>
                                <a href="{{ route('student.task.show', $task) }}" class="btn btn-info">View</a>

                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
