<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
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

    <style>
        .about {
            width: 100%;
            padding: 78px 0px;
            background-color: #191919;
        }

        .about img {
            height: 450px;
            width: 500px;
        }

        .about-text {
            width: 550px;
        }

        .mainn {
            width: 1130px;
            max-width: 95%;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .about-text h1 {
            color: white;
            font-size: 80px;
            text-transform: capitalize;
            margin-bottom: 20px;
        }

        .about-text h5 {
            color: white;
            font-size: 25px;
            text-transform: capitalize;
            margin-bottom: 25px;
            letter-spacing: 2px;
        }



        .about-text p {
            color: #fcfc;
            letter-spacing: 1px;
            line-height: 28px;
            font-size: 18px;
            margin-bottom: 45px;
        }

        .MV {
            text-align: center;
            margin: 50px 0;
        }

        .MV h2 {
            color: #191919;
            font-size: 40px;
            margin-bottom: 20px;
        }

        .MV p {
            color: #149791;
            font-size: 18px;
            line-height: 28px;
            letter-spacing: 1px;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>

</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

<section class="about">

    <div class="mainn">
        <img class="rounded" src="images/aboutusimg.jpg">
        <div class="about-text">
            <h1>About Us</h1>
            <h5>DC Clothing Store</h5>
            <p>Welcome to Your Trendy Fashion Hub, the ultimate destination for the latest and most stylish clothing trends. Since our establishment in 2023, we have been dedicated to providing fashion-forward individuals with high-quality, on-trend apparel and accessories. Explore our collection and elevate your style today!</p>
            <button type="button" onclick="window.location.href='index.html'">Explore Now</button>

        </div>
    </div>
</section>

<section class="MV">
    <h2>Our Mission & Vision</h2>
    <p>Our mission is to offer a wide range of clothing options that cater to diverse tastes and styles. We are dedicated to providing excellent customer service and ensuring that every shopping experience with us is enjoyable and satisfying.</p>
    </br> <p>Our vision is to become a leading online fashion retailer known for its unique collections, affordability, and commitment to sustainability.</p>
</section>

<section style="display: flex; align-items: center; justify-content: center">
    <img style="align-items: center; border-radius: .2rem" src="images/mission.png" alt="Mission Image" width="40%" height="250px">
</section>

<section class="MV">
    <h2 style="color: red ;">Meet Our Team</h2>
    <img class="rounded" src="images/team.jpeg"  width="70%" height="400px"   alt="Team Image">
</section>
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

</script>
</body>
</html>
