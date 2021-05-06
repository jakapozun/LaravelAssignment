<x-admin-master>

    @section('content')

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1>Edit Task: {{ $task->title }}</h1>

                    <form action="{{ route('update.task', $task) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="user">User</label>
                            <select class="form-control" name="user_id" id="user">
                                <option value="{{$task->user->id}}" selected>Current: {{ $task->user->name }}</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}"> {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}">
                        </div>

                        <div class="form-group">
                            <label for="task_date">Date</label>
                            <input type="date" class="form-control" id="task_date" name="task_date"
                                   value="{{$task->task_date}}">
                        </div>

                        <div class="form-group">
                            <label for="short_desc">Short Description</label>
                            <input type="text" class="form-control" id="short_desc" value="{{$task->short_description}}"
                                   name="short_description">
                        </div>

                        <div class="form-group">
                            <label for="long_desc">Long Description</label>
                            <textarea class="form-control" id="long_desc" rows="3" name="long_description">{{ $task->long_description }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status_id" id="status">
                                <option value="{{$task->status->id}}">Current: {{ $task->status->name }}</option>
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}"> {{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </form>
                </div>
            </div>
        </div>

    @endsection
</x-admin-master>
