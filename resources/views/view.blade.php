@if (empty($data))
    <h5 class="text-center text-danger">No Data Found</h5>
@else
    <div class="text-center p-2">
        <h4><strong>{{ $data->id }}</strong></h4>
        <h4><strong>Name: </strong> {{ $data->name }}</h4>
        <h4><strong>Email: </strong> {{ $data->email }}</h4>
    </div>
@endif
