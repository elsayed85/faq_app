@extends('admin.layouts.app')

@section('title' , "Add New Student")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(session()->has('new_student'))
                <div class="alert alert-success" role="alert">
                    <a href="{{ route('admin.stu.show' , session("new_student")) }}">show
                        {{ session("new_student")->username }} profile</a>
                </div>
                @endif
                <div class="card-header">Add New Student</div>
                <div class="card-body">
                    <form action="{{ route('admin.stu.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="tasusernamek_url"
                                placeholder="Enter username" value="{{ old('username') }}">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Enter password" value="{{ old('password') }}">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmtion">Password Confirmation</label>
                            <input type="password" name="password_confirmtion"
                                class="form-control @error('password_confirmtion') is-invalid @enderror"
                                id="password_confirmtion" placeholder="Enter password again"
                                value="{{ old('password_confirmtion') }}">

                            @error('password_confirmtion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
