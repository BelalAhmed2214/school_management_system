@extends('layouts.app')

@section('title', 'Create Exam Result')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Create Exam Result</h4>
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

                <form method="POST" action="{{ route('teacher.examResult.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="exam">Exam</label>
                        <select class="form-control" id="exam_id" name="exam_id" required>
                            <option value="">Select The Exam</option>
                            @foreach($exams as $exam)
                                <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="student">Student</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">Select The Student</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="degree">Degree</label>
                        <input type="text" class="form-control" id="degree" name="degree" value="{{ old('degree') }}" required>

                    </div>

                    <button type="submit" class="btn btn-primary">Create Exam Result</button>
                </form>
            </div>
        </div>
    </div>
@endsection
