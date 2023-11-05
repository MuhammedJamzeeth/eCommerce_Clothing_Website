<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <base href="{{ url('/') }}">
    {{--DataTable--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

        .container1{
            display: flex;
            justify-content: end;
        }
        .audun_success {
            color: #ffffff;
            background-color: #01ff00;
            font-family: 'Source Sans Pro', sans-serif;
            border-radius:.5em;
            margin: 10px 0px;
            padding:12px;
            width: 400px;
        }
        .audun_warn {
            color: #ffffff;
            background-color: #ff0000;
            font-family: 'Source Sans Pro', sans-serif;
            border-radius:.5em;
            margin: 10px 0px;
            padding:12px;
            width: 400px;
        }
    </style>

</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div id="main" class="content-wrapper ">
                <div class="container1 text-center">
                    @if(session()->has('message') && session('message'))
                        <div id="alertDiv" class="audun_success">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            {{session('message')}}
                        </div>
                    @endif
                    @if(session()->has('deleteMessage'))
                        <div id="alertDiv" class="audun_warn">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            {{session('deleteMessage')}}
                        </div>
                    @endif
                </div>
                <section class="content">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered table-hover table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td style="white-space: normal;">{{$user->address}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <form action="{{route('admin.delete_user',$user->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" value="{{$user->id}}"  class="btn btn-danger p-1 deleteOrder">DELETE</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </section>
            </div>
        </div>
    </div>
</div>


<!-- container-scroller -->
<!-- plugins:js -->
{{--        Datatable--}}
<script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>



<script>
    $(document).ready( function () {
        $('#example').DataTable({
            "autoWidth": false,
        });
    } );
</script>

@include('admin.script')
<!-- End custom js for this page -->
<script>
    $(document).ready(function() {
        // Store the row data when a "Delete" button is clicked
        $('.deleteOrder').click(function(e) {
            e.preventDefault();
            var id = $(this).val();
            // var category = $(this).data('category');

            // Use a confirm dialog to ask for confirmation
            var isConfirmed = confirm('Are you sure you want to delete the item with ID: ' + id);

            if (isConfirmed) {
                // If user confirms, submit the form
                $(this).closest('form').submit();
            }
        });
    });
</script>
<script>
    setTimeout(function () {
        var alertDiv = document.getElementById('alertDiv');
        if (alertDiv) {
            alertDiv.style.opacity = '0';
            setTimeout(function () {
                alertDiv.style.display = 'none';
            }, 2000); // 1 second for the fade-out animation
        }
    }, 4000); // 5000 milliseconds = 5 seconds
</script>



</body>
</html>
