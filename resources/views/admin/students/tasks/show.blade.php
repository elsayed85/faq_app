@extends('admin.layouts.app')

@section('title' , "Task " . $task->id)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.stu.show' , $task->user) }}">
                        <span class="mr-7">
                            <img width="34" src="https://ui-avatars.com/api/?name={{ $task->user->username }}"
                                class="rounded-circle" alt="{{ $task->user->username }}">
                            <b>{{ $task->user->username }}</b>
                        </span>
                    </a>
                    ===> Task ({{ $task->id }})
                    <a href="{{ route('admin.stu.task.edit' , $task) }}">
                        <button type="button" class="btn btn-primary btn-sm float-right">Edit</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ $task->url }}" allowfullscreen></iframe>
                    </div>
                    <a href="{{ $task->url }}" target="_blank" rel="noopener noreferrer">
                        <button type="button" class="btn btn-primary btn-sm btn-block">open in new Tab</button>
                    </a>
                    <hr>
                    @comments(['model' => $task , 'maxIndentationLevel' => 7 ])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
