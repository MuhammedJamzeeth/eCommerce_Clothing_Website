<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    {{--DataTable--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Required meta tags -->
    @include('admin.css')
    <style>

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
                <section class="content">
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-hover table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Product Name</th>
                            <th>Old Price</th>
                            <th>Current Price</th>
                            <th>Quantity</th>
                            <th>Active</th>
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><img src="product/{{$product->image}}" alt="img"></td>
                                <td>{{$product->title}}</td>
                                <td>Rs.{{$product->old_price}}</td>
                                <td>Rs.{{$product->current_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>
                                    <form action="{{route('admin.active',$product->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            @if($product->is_active == 1)
                                                <button type="submit" class="btn btn-danger" style="font-size: small; padding: 4px" name="action" value="0">Deactivate</button>
                                            @else
                                                <button type="submit" class="btn btn-success" style="font-size: small; padding: 4px" name="action" value="1">Activate</button>
                                            @endif
                                    </form>
                                </td>
{{--                                <td>{{htmlspecialchars(trim(strip_tags($product->description)))}}</td>--}}
                                <td>{{$product->color}}</td>
                                <td><button type="button" class="btn btn-primary" style="font-size: small;padding: 4px">Edit</button>
                                    <button type="button" class="btn btn-danger" style="font-size: small;padding: 4px">Delete</button>

                                </td>
                            </tr>
                        @endforeach
                        </tfoot>
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
        $('#example').DataTable();
    } );
</script>

        @include('admin.script')
        <!-- End custom js for this page -->


</body>
</html>
