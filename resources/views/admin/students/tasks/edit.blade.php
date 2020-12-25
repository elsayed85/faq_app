@extends('admin.layouts.app')

@section('title' , "Edit Task " . $task->id)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Task ({{ $task->id }})
                    <a href="{{ route('admin.stu.task.show' , $task) }}">
                        <button type="button" class="btn btn-primary btn-sm float-right">Show</button>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.stu.task.update' , $task) }}" method="POST">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <label for="user">User</label>
                            <select name="user_id" id="user" class="custom-select">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if(old('user_id' , $task->user_id) == $user->id) selected
                                    @endif>({{ $user->id }}) {{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="task_url">Url</label>
                            <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" id="task_url"
                                placeholder="Enter Your Task Url" value="{{ old('url' , $task->url) }}">

                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
