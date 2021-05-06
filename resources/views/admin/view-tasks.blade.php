<x-admin-master>

    @section('content')

        <h1>View All Tasks</h1>

        @if( session()->has('success_message') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

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
