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
                <p>Current Status: <u>{{ $task->status->name }}</u></p>

                <form action="{{ route('change.status', $task) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <select class="form-control" name="status_id">
                            @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Change Status</button>
                </form>
            </div>
        </div>

    </div>
@endsection
