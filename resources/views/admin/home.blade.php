@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <a href="{{ route('admin.stu.index') }}">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-center">
                                                    <h3>{{ $studentsCount }}</h3>
                                                    <span>Students Count</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="{{ route('admin.stu.task.index') }}">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-center">
                                                    <h3>{{ $tasksCount }}</h3>
                                                    <span>Tasks Count</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-center">
                                                    <h3>{{ $unReadedNotificationsCount }}</h3>
                                                    <span>UnReaded Notifications</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    @livewire('notifications')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
