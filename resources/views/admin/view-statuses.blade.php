<x-admin-master>

    @section('content')

        <h1>View All Statuses</h1>

        <div class="col-12">
            @foreach($statuses as $status)
                <div class="card mb-1">
                    <div class="card-body">
                        <h2>{{ $status->name }}</h2>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('edit.status', $status) }}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                            <form action="{{ route('destroy.status', $status) }}" method="POST">
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
