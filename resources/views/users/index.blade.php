@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>TASKS</h1>
        </div>
        <div class="row justify-content-center">
            Total: {{ $tasks->count() }}
            {{--            <div class="form-group">--}}
            {{--                <input type="text" class="form-control" placeholder="Search by..." id="search">--}}
            {{--            </div>--}}
        </div>
        <hr>
        @if( session()->has('success_message') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row mt-2">
            @foreach($tasks as $task)
                <div class="card w-100 mb-2">
                        <h5 class="card-header">{{ $task->title }}
                        </h5>
                        <span class="badge badge-warning">Status: {{ $task->status->name }}</span>
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->short_description }}</h5>
                        <h3 class="card-title">Finish Until: {{ $task->task_date }}</h3>
                        <a href="{{ route('show', $task) }}">
                            <button class="btn btn-primary btn-sm">View Task</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
