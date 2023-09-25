@extends('layouts.app')

@section('title', 'All Articles')

@section('content')
    <div class="container">
        <div>
            <a href="{{route('teacher.article.create')}}" class="btn btn-success">Add Article</a>
        </div>
        <br>
        <div class="card-header">
            <h4>All Articles</h4>
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
                        <th>Published by</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0 ?>
                    @foreach ($articles as $article)
                            <?php $i++ ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{$article->user->name}}</td>
                            <td>{{$article->course->name}}</td>
                            <td>
                                    <a href="{{ route('teacher.article.show', $article) }}" class="btn btn-secondary mr-1">View</a>

                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
