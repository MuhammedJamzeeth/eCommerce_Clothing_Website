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
                                <th>Photo</th>
                                <th>Product Name</th>
                                <th>Current Price</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Active?</th>
                                <th>Color</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td style="width:82px;"><img src="product/{{$product->image}}" alt="img" style="width:50px;height: 50px"></td>
                                    <td>{{$product->title}}</td>
                                    <td>Rs.{{$product->current_price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->size}}</td>
                                    <td>
                                        <form action="{{route('admin.active',$product->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                @if($product->is_active == 1)
                                                    <button type="submit" class="btn btn-danger rounded-pill" style="font-size: small;width: 40px; padding: 3px" name="action" value="0">No</button>
                                                @else
                                                    <button type="submit" class="btn btn-success rounded-pill" style="font-size: small;width: 40px; padding: 4px" name="action" value="1">Yes</button>
                                                @endif
                                        </form>
                                    </td>
    {{--                                <td>{{htmlspecialchars(trim(strip_tags($product->description)))}}</td>--}}
                                    <td>{{$product->color}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-3 pl-1">
                                        <a href="{{route('editProduct',['id'=>$product->id])}}"><button type="submit" class="btn btn-primary" style="font-size: small;padding: 4px">Edit</button></a>
                                            </div>
                                            <div class="col-3">
                                        <form method="POST" action="{{url('/delete_product',$product->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="{{$product->id}}" data-category="{{$product->title}}" class="btn btn-danger deleteCat" style="font-size: small;padding: 4px">Delete</button>
                                            </div>
                                        </form>
                                        </div>

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
        $('.deleteCat').click(function(e) {
            e.preventDefault();
            var id = $(this).val();
            var category = $(this).data('category');

            // Use a confirm dialog to ask for confirmation
            var isConfirmed = confirm('Are you sure you want to delete the item with ID: ' + id + ' and product: ' + category + '?');

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
