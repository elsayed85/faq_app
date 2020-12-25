@extends('admin.layouts.app')

@section('title' , "Add New Student")

@php
    $admin = auth()->guard("admin")->user();
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Settings</div>
                <div class="card-body">

                <form action="{{ route("admin.update_info") }}" method="POST">
                    @csrf
                    @method("patch")
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Enter name" value="{{ $admin->name }}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="Enter email" value="{{ $admin->email }}">

                        @error('email')
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

                <div class="card-body">
                    <form action="{{ route("admin.change_password") }}" method="POST">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <label for="password">Current Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Enter Current password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password"
                                class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                                placeholder="Enter new password" >

                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">New Password Confirmation</label>
                            <input type="password" name="new_password_confirmation"
                                class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                id="new_password_confirmation" placeholder="Enter password again"
                                >

                            @error('new_password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
