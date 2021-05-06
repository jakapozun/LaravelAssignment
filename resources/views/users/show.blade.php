@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Task {{ $task->id }}</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>Title: {{ $task->title }}</h2>
                <h4>End Date: {{ $task->task_date }}</h4>
                <p>About Task:<br>{{ $task->short_description }}</p>
                <p>Detailed Description: <br>{{ $task->long_description }}</p>
                <h4>User: {{ $task->user->name }}</h4>
                <p>Current Status: {{ $task->status }}</p>

                <form action="">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option value="Todo" default>Todo</option>
                            <option value="Working On">Working On</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>
                    <button class="btn btn-success">Change Status</button>
                </form>
            </div>
        </div>

    </div>
@endsection
