@if (empty($data))
    <h5 class="text-center text-danger">No Data Found</h5>
@else
    <form action="{{ route('users.edit') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="email" name="email" class="form-control" value="{{ $data->email }}">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endif
