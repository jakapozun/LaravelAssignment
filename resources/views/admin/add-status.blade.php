<x-admin-master>

    @section('content')

        <h1>Add New Tasks</h1>

        <div class="col-12">
            <form action="{{ route('store.status') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Status Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name..." name="name">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    @endsection
</x-admin-master>
