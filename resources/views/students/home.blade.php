@extends('students.layouts.app')
@section('css')

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('stu.task.index') }}">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-center">
                                                    <h3>{{ $tasksCount }}</h3>
                                                    <span>Tasks</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    @livewire('notifications')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
