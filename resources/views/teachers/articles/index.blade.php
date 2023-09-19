@extends('layouts.app')

@section('title', 'All Articles')

@section('content')
    <div class="container">
        <div>
            <a href="#" class="btn btn-success">Add Article</a>
        </div>
        <br>
        <div class="card-header">
            <h4>All Articles</h4>
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
                        <th>Content</th>
                        <th>Published by</th>
                        <th>Created At</th>
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
                            <td>{{ $article->content }}</td>
                            <td>{{ $article->user->name}}</td>
                            <td>{{ $article->created_at }}</td>
                            <td>
                                <a href="{{ route('article.show', $article) }}" class="btn btn-info">View</a>
                                <a href="{{ route('article.edit', $article) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('article.destroy', $article) }}" method="POST" style="display: inline;">
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
