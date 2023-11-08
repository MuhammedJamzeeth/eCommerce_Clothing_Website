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

</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
{{--    <!-- end header section -->--}}
    <!-- slider section -->
    <!-- end slider section -->
<!-- why section -->

<!-- end why section -->

<!-- arrival section -->

<!-- end arrival section -->

<!-- product section -->
@include('home.cat_show_product')
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
    <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/">Group 04</a><br>

        Distributed By <a href="" target="_blank">G4</a>

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


<script>
    $(document).ready( function () {
        $('#example').DataTable({
            "autoWidth": false,
        });
    } );
</script>
</body>
</html>
