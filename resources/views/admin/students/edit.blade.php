@extends('admin.layouts.app')

@section('title' , "Add New Student")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit {{ $student->username }} profile</div>
                <div class="card-body">
                    <form action="{{ route('admin.stu.update' , $student) }}" method="POST">
                        @csrf
                        @method("patch")
                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="tasusernamek_url"
                                placeholder="Enter username" value="{{ old('username' , $student->username) }}">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
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
                            <label for="new_password_confirmation">New Password Confirmation</label>
                            <input type="password" name="new_password_confirmation"
                                class="form-control @error('new_password_confirmtion') is-invalid @enderror"
                                id="new_password_confirmation" placeholder="Enter password again">

                            @error('new_password_confirmation')
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
