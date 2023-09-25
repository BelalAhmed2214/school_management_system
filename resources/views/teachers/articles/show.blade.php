@extends('layouts.app')

@section('title', 'Show Article')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Show Article</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <p>{{ $article->title }}</p>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <p>{{ $article->content }}</p>
                </div>
                <div class="form-group">
                    <label for="course">Course:</label>
                    <p>{{ $article->course->name }}</p>
                </div>
                <div class="form-group">
                    <label for="created_at">Created At:</label>
                    <p>{{ $article->created_at }}</p>
                </div>
                <div class="form-group">
                    <a href="{{ route('teacher.article.edit', $article) }}" class="btn btn-primary mr-1">Edit Article</a>
                    <form action="{{ route('teacher.article.destroy', $article) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
