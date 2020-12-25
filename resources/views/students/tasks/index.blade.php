@extends('students.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tasks
                    <a href="{{ route('stu.task.create') }}" target="_blank" rel="noopener noreferrer">
                        <button type="button" class="btn btn-primary btn-sm float-right">Add New</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td scope="col">#</td>
                                    <td scope="col">Url</td>
                                    <td scope="col">Notes Count</td>
                                    <td scope="col">Created At</td>
                                    <td scope="col">Updated At</td>
                                    <td scope="col"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tasks as $task)
                                <tr>
                                    <td scope="row">{{ $task->id }}</td>
                                    <td scope="row"><a href="{{ $task->url }}" target="_blank"
                                            rel="noopener noreferrer">{{ \Str::limit($task->url, 20, '...') }}</a></td>
                                    <td scope="row">{{ $task->comments_count }}</td>
                                    <td scope="row">{{ $task->created_at->diffForHumans() }}</td>
                                    <td scope="row">{{ $task->updated_at->diffForHumans()  }}</td>
                                    <td scope="row">
                                        <div class="float-right">
                                            <a href="{{ route('stu.task.show' , $task) }}">
                                                <button type="button" class="btn btn-primary btn-sm ">Show</button>
                                            </a>
                                            <a href="{{ route('stu.task.edit' , $task) }}">
                                                <button type="button" class="btn btn-primary btn-sm ">Edit</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" style="text-align: center">No Tasks Yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $tasks->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
