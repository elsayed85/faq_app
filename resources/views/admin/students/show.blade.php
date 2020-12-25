@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $student->username }} Profile</div>

                <div class="card-body">
                    <h2>Change Password</h2>
                    <form action="{{ route('admin.stu.changePassword' , $student) }}" method="POST">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <label for="new_password">New password</label>
                            <input type="password" name="new_password"
                                class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                                placeholder="Enter new password">

                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">New password confirmation</label>
                            <input type="password" name="new_password_confirmation"
                                class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                id="new_password_confirmation" placeholder="Enter new password again">

                            @error('new_password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>

                    <hr>
                    <h2>Tasks ({{ $tasks->total() }})</h2>
                    <ul class="list-group">
                        @forelse ($tasks as $task)
                        <a href="{{ route('admin.stu.task.show' , $task) }}">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                ({{ $task->id }}) <a href="{{ $task->url }}" target="_blank"
                                    rel="noopener noreferrer">{{ \Str::limit($task->url, 60, '...') }}</a>
                                <span class="badge badge-primary badge-pill">{{ $task->comments_count }}</span>
                            </li>
                        </a>
                        @empty
                        <li class="list-group-item d-flex justify-content-between align-items-center empty_list">No Tasks yet</li>
                        @endforelse
                        {{ $tasks->render() }}
                    </ul>

                    <hr>
                    <h2>Comments ({{ $comments->total() }})</h2>
                    <ul class="list-group">
                        @forelse ($comments as $comment)
                        <li class="list-group-item align-items-center">
                            ({{ $comment->id }}) <a
                                href="{{ route('admin.stu.task.show' , $comment->commentable) }}#comment-{{ $comment->id }}"
                                target="_blank"
                                rel="noopener noreferrer">{{ \Str::limit($comment->comment, 70, '...') }}</a>
                            <form action="{{ route('admin.stu.comment.delete' , $comment) }}" method="post"
                                class="float-right">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </li>
                        @empty
                        <li class="list-group-item align-items-center empty_list">No comments yet</li>
                        @endforelse
                        {{ $comments->render() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
