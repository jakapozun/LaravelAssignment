<x-admin-master>

    @section('content')

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1>Edit Status: {{ $status->name }}</h1>

                    <form action="{{ route('update.status', $status) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Status Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $status->name }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

    @endsection
</x-admin-master>
