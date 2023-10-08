@extends('layouts.app')

@section('title', 'Exam Results')

@section('content')
    <div class="container">
        <div>
            <a href="{{route('teacher.examResult.create')}}" class="btn btn-success">Add Exam Result</a>
        </div>
        <br>
        <div class="card-header">
            <h4 style="padding-top: 10px;">All Exams Results</h4>
        </div>
        <br>
{{--        @if (count($examResults) > 0)--}}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Exam</th>
                    <th>Student</th>
                    <th>Degree</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0 ?>
                @foreach ($examResults as $result)
                        <?php $i++ ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$result->exam->name}}</td>
                        <td>{{$result->user->name}}</td>
                        <td>{{$result->degree}}</td>
                        <td>
                            {{-- Add actions like edit and delete buttons --}}
                            <a href="{{ route('teacher.examResult.edit', $result->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('teacher.examResult.destroy', $result->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
{{--        @else--}}
{{--            <p>No exam results found.</p>--}}
{{--        @endif--}}
    </div>
@endsection
