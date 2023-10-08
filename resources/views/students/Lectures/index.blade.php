@extends('layouts.app')

@section('title', 'Lectures')

@section('content')
    <div class="container">
        <div class="card-header">
            <h4>All Lectures</h4>
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
                                <a href="{{ route('teacher.lecture.show', $lecture) }}" class="btn btn-primary mr-1">View</a>

                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
