@extends('layouts.app')

@section('title', 'All Videos')

@section('content')
    <div class="container">
        <div>
            <a href="#" class="btn btn-success">Add Video</a>
        </div>
        <br>
        <div class="card-header">
            <h4>All Videos</h4>
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
                        <th>Video Path</th>
                        <th>Published by</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0 ?>

                    @foreach ($videos as $video)
                            <?php $i++ ?>

                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $video->title }}</td>
                            <td>{{ $video->description }}</td>
                            <td>{{ $video->path }}</td>
                            <td>{{ $video->user->name }}</td>
                            <td>{{ $video->created_at }}</td>
                            <td>
                                <a href="{{ route('video.show', $video) }}" class="btn btn-info">View</a>
                                <a href="{{ route('video.edit', $video) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('video.destroy', $video) }}" method="POST" style="display: inline;">
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
