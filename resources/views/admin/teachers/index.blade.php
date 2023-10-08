@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div>
                        <a href="{{route('admin.teacher.create')}}" class="btn btn-success">Add Teacher</a>
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
                    <div class="card-header">{{ __('Teachers') }}</div>

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
                                @foreach ($teachers as $teacher)
                                        <?php $i++ ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>
                                            <!-- Add action buttons or links here -->
                                            <a href="#" class="btn btn-secondary">View</a>
                                            <a href="{{route('admin.teacher.edit',$teacher->id)}}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('admin.teacher.destroy', $teacher->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this exam?');">
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
