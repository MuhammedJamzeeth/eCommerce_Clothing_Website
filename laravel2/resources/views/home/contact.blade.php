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
    <section>
        <div class="row m-5 p-3 rounded" style="background-color: #FFF6F6">
            <div class="col-md-6">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" style="background-color: #0d1452;" class="btn btn-primary">Send Message</button>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Message</label>
                <textarea style="height: 220px" class="form-control" aria-label="With textarea"></textarea>
            </div>
            </form>
        </div>
    </section>
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
