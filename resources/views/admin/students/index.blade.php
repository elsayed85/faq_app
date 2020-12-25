@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Students
                    <a href="{{ route('admin.stu.create') }}" target="_blank" rel="noopener noreferrer">
                        <button type="button" class="btn btn-primary btn-sm float-right">Add New Student</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td scope="col">#</td>
                                    <td>username</td>
                                    <td scope="col">Tasks Count</td>
                                    <td scope="col">Created At</td>
                                    <td scope="col">Updated At</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                <tr>
                                    <td scope="row">{{ $student->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.stu.show' , $student) }}">
                                            <span class="mr-7">
                                                <img width="34"
                                                    src="https://ui-avatars.com/api/?name={{ $student->username }}"
                                                    class="rounded-circle" alt="{{ $student->username }}">
                                                <b>{{ $student->username }}</b>
                                            </span>
                                        </a>
                                    </td>
                                    <td scope="row">{{ $student->tasks_count }}</td>
                                    <td scope="row">{{ $student->created_at->diffForHumans() }}</td>
                                    <td scope="row">{{ $student->updated_at->diffForHumans()  }}</td>
                                    <td scope="row">
                                        <div class="float-right">
                                            <a href="{{ route('admin.stu.show' , $student) }}">
                                                <button type="button" class="btn btn-primary btn-sm ">Show</button>
                                            </a>
                                            <a href="{{ route('admin.stu.edit' , $student) }}">
                                                <button type="button" class="btn btn-primary btn-sm ">Edit</button>
                                            </a>
                                            <form action="{{ route('admin.stu.destroy' , $student) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" style="text-align: center">No Students Yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $students->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
