<!DOCTYPE html>

<html>

<head>
    <title>User List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/webToast.css') }}">
    <script src="{{ asset('assets/webToast.js') }}"></script>
</head>

<body>
    <div class="container p-0 card">
        <h1 class="text-center bg-success text-white p-4">User List</h1>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <!-- Button trigger modal -->



    <!-- Modal -->
    <div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</body>

<script type="text/javascript">
    function dataForm() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [

                {
                    data: 'id',
                    name: 'id'
                },

                {
                    data: 'name',
                    name: 'name'
                },

                {
                    data: 'email',
                    name: 'email'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    }

    $(function() {
        dataForm();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '.view', function() {
            var id = $(this).attr('value');
            $.ajax({
                type: "get",
                url: "{{ route('users.view') }}",
                dataType: "json",
                data: {
                    "id": id
                },
                success: function(data) {
                    webToast.Success({
                        status: '',
                        message: 'Data Fetched!'
                    });
                    $('body').find('.modal-body').html(data.html);
                    $('body').find('#modalView').modal('show')
                },
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '.edit', function() {
            var id = $(this).attr('value');
            $.ajax({
                type: "get",
                url: "{{ route('users.edit') }}",
                dataType: "json",
                data: {
                    "id": id
                },
                success: function(data) {
                    webToast.Success({
                        status: '',
                        message: 'Data Fetched!'
                    });
                    $('body').find('.modal-body').html(data.html);
                    $('body').find('#modalView').modal('show')
                },
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '.update', function() {
            var id = $('#user_id').val();
            var name = $('#user_name').val();
            var email = $('#user_email').val();
            $.ajax({
                type: "get",
                url: "{{ route('users.update') }}",
                dataType: "json",
                data: {
                    "id": id,
                    'name': name,
                    'email': email,
                },
                success: function(data) {
                    $('body').find('#modalView').modal('hide')
                    webToast.Success({
                        status: '',
                        message: 'Data Updated!'
                    });

                    var table = $('.data-table').DataTable();
                    table.draw();
                },
            });
        });
    });
</script>

</html>
