@extends('layouts.app')

@section('title', 'students')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div>
                        <a href="{{route('admin.student.create')}}" class="btn btn-success">Add Student</a>
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
                    <div class="card-header">{{ __('Students') }}</div>

                    <div class="card-body">



                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $i=0 ?>
                                @foreach ($students as $student)
                                        <?php $i++ ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>
                                            <!-- Add action buttons or links here -->
                                            <a href="#" class="btn btn-secondary">View</a>
                                            <a href="{{route('admin.student.edit',$student)}}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this exam?');">
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
        </div>
    </div>
@endsection
