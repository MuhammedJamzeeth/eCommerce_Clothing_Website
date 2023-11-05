<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <base href="{{ url('/') }}">

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/logo2.png" type="">
    <title>Dress Code</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    {{--DataTable--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
    <!-- end slider section -->

<!-- why section -->
<!-- end why section -->

<!-- arrival section -->
<!-- end arrival section -->
    <div class="container mt-5 mb-5">
<section class="content">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered table-hover table-striped" style="width:100%">
            <thead>
            <tr>
                <th>No</th>
                <th>Photo</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Color</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=1
            @endphp
            @foreach($showCarts as $cart)
                @php
                    $product = \Illuminate\Support\Facades\DB::table('products')->where('id','=',$cart->p_id)->first();
                @endphp
{{--                @dd($product)--}}

                @if($product)
                    <tr>
                        <td>{{$i++}}</td>
                        <td style="width:100px ;"><img src="product/{{$product->image}}" alt="img" style="width:50px;height: 50px"></td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->size}}</td>
                        <td>{{$product->color}}</td>
                        <td class="price">{{$product->current_price}}</td>
                        <td>
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="number" min="1" class="numberInput" style="width: 80px; height: 30px" value="{{$cart->qty}}">
                            </form>
                        </td>
                        {{--                                <td>{{htmlspecialchars(trim(strip_tags($product->description)))}}</td>--}}
                        <td class="total">0</td>
                        <td style="text-align: center; font-size: 24px">
                            <a href="{{route('home.deleteCat',$cart->id)}}" style="color: red"><iconify-icon icon="material-symbols:delete"></iconify-icon></a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
            <tfoot>
                <th colspan="7" style="text-align: right">Total</th>
                <th colspan="2" id="grantTotal">Rs.</th>

            </tfoot>
        </table>
    </div>
    <div class="row mt-3">
        <div class="col-md-9">
        </div>
        <div class="col-md-1">
{{--            <button type="button" class="btn btn-success">Success</button>--}}
        </div>
        <div class="col-md-2 ">
            @if($getCart)
            <form action="{{url('/pay_order',$getCart->u_id)}}" method="GET">
                @csrf
                <button type="submit" class="btn btn-success">Checkout now</button>
                @else
                    <button type="submit" class="btn btn-success" style="cursor: not-allowed" disabled>Checkout now</button>

            </form>
            @endif
        </div>
    </div>
</section>
    </div>
<!-- product section -->

<!-- end product section -->

<!-- subscribe section -->
@include('home.subscribe')
<!-- end subscribe section -->
<!-- client section -->
@include('home.client')
<!-- end client section -->
<!-- footer start -->
@include('home.footer')
<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

<script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>

    </script>

    <script>
    $(document).ready( function () {
        $('#example').DataTable({
            "autoWidth": false,
        });
    } );
</script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</body>
</html>
