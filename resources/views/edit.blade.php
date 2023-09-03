@if (empty($data))
    <h5 class="text-center text-danger">No Data Found</h5>
@else
    <form action="{{ route('users.edit') }}" method="post">
        @csrf
        <input type="hidden" id="user_id" name="id" value="{{ $data->id }}">
        <div class="form-group mb-4">
            <label for="name" class="mb-2">Name</label>
            <input id="user_name" type="text" name="name" class="form-control" value="{{ $data->name }}">
        </div>
        <div class="form-group mb-4">
            <label for="email" class="mb-2">Name</label>
            <input id="user_email" type="email" name="email" class="form-control" value="{{ $data->email }}">
        </div>
        <button type="button" class="update btn btn-success">Save</button>
    </form>
@endif
