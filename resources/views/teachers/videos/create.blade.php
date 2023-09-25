@extends('layouts.app')

@section('title', 'Upload Video')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Video</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('teacher.video.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="course_id">Course</label>
                                <select class="form-control @error('course_id') is-invalid @enderror" id="course_id" name="course_id" required>
                                    <option value="">Select a Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="video">Video File</label>
                                <input type="file" class="form-control-file @error('video') is-invalid @enderror" id="video" name="video" accept="video/*" required>
                                @error('video')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Upload Video</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection