<x-admin-master>

    @section('content')
        <div class="jumbotron">
            <h1 class="display-4">Hello, Admin!</h1>
            <hr class="my-4">
            <p class="lead">Number of users: {{ $users->count() }} </p>
            <p class="lead">Number of tasks: {{ $tasks->count() }} </p>
            <p class="lead">Number of statuses: {{$statuses->count() }} </p>
            <hr class="my-4">
        </div>
    @endsection
</x-admin-master>
