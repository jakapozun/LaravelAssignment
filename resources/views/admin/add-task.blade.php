<x-admin-master>

    @section('content')

        <h1>Add New Tasks</h1>

        <div class="col-12">
            <form action="{{ route('store.task') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user">User</label>
                    <select class="form-control" name="user_id" id="user">
                        @foreach($users as $user)
                            <option value="{{$user->id}}"> {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Title..." name="title">
                </div>

                <div class="form-group">
                    <label for="task_date">Date</label>
                    <input type="date" class="form-control" id="task_date" name="task_date">
                </div>

                <div class="form-group">
                    <label for="short_desc">Short Description</label>
                    <input type="text" class="form-control" id="short_desc" placeholder="Short Description..."
                           name="short_description">
                </div>

                <div class="form-group">
                    <label for="long_desc">Long Description</label>
                    <textarea class="form-control" id="long_desc" rows="3" name="long_description"></textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status_id" id="status">
                        @foreach($statuses as $status)
                        <option value="{{$status->id}}"> {{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    @endsection
</x-admin-master>
