@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>TODOS</h1>
        </div>
        <div class="row justify-content-center">
            <a href="{{ route('wo') }}">
                <button class="btn btn-dark mr-1">Working On</button>
            </a>

            <a href="{{ route('done') }}">
                <button class="btn btn-dark">Done</button>
            </a>
        </div>

        <hr>


        <div class="row mt-2">
            @foreach($tasks as $task)
                <div class="card w-100 mb-2">
                    <div class="">
                        <h5 class="card-header">{{ $task->title }}
                        <span class="badge badge-info">Todo</span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->short_description }}</h5>
                        <h3 class="card-title">End date: {{ $task->task_date }}</h3>
                        <a href="{{ route('show', $task) }}">
                            <button class="btn btn-primary btn-sm">View Task</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
