@extends('layouts.app')

@section('title', 'All Videos')

@section('content')
    <div class="container">
        <div>
            <a href="{{route('teacher.video.create')}}" class="btn btn-success">Add Video</a>
        </div>
        <br>
        <div class="card-header">
            <h4>All Videos</h4>
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
            <div class="col-md-10">
                <div class="table-container" style=" overflow-x: auto;"> <!-- Add this container div -->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=0 ?>

                        @foreach ($videos as $video)
                                <?php $i++ ?>

                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{$video->title }}</td>
                                <td>{{$video->course->name}}</td>
                                <td>
                                        <a href="{{ route('teacher.video.show', $video) }}" class="btn btn-primary">View</a>




                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div> <!-- Close the container div -->
            </div>
        </div>
    </div>
@endsection
