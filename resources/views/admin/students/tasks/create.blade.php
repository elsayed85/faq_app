@extends('admin.layouts.app')

@section('title' , "Add New Task")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Task</div>
                <div class="card-body">
                    <form action="{{ route('admin.stu.task.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="user">User</label>
                            <select name="user_id" id="user" class="custom-select">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if(old('user_id')==$user->id) selected
                                    @endif>({{ $user->id }}) {{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="task_url">Url</label>
                            <input type="url" name="url" class="form-control @error('url') is-invalid @enderror"
                                id="task_url" placeholder="Enter Your Task Url" value="{{ old('url') }}">

                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
