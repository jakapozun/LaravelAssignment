<x-admin-master>

    @section('content')

        <h1>View All Tasks</h1>

        <div class="col-12">

            @foreach($tasks as $task)
                <div class="card mb-1">
                    <div class="card-body">
                        <h3>Title: {{ $task->title }}</h3>
                        <h3>User: {{ $task->user->name }}</h3>
                        <p>Created at: {{ $task->created_at }} -- {{ $task->created_at->diffForHumans() }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('edit.task', $task) }}">
                                <button class="btn btn-info">Edit Task</button>
                            </a>
                            <form action="{{ route('destroy.task', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="alert('Are you sure?')">Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        @endsection
</x-admin-master>
