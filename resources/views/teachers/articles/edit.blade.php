@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Edit Article</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('teacher.article.update', $article) }}">
                    @csrf
                    @method('PUT') <!-- Use PUT method for update -->

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $article->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required>{{ old('content', $article->content) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="course_id">Course</label>
                        <select class="form-control" id="course_id" name="course_id" required>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ $course->id == $article->course_id ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection
