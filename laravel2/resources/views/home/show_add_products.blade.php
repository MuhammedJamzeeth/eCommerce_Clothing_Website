<!DOCTYPE html>
<html>
<head>
    <base href="{{ url('/') }}">
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
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
    <style>
        .nav-link {
            color: #f7444e; /* Default text color for inactive tabs */
        }

        .nav-link.active {
            color: red; /* Text color for the active tab */
        }
        .small-img-group{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;

        }
        .small-img-col{
            margin: 0 6px;
            width: 100px;
        }
        .small-img-col img{
            border-radius: 0.5rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>

                <div class="product">
                    <div class="row mt-5">

                        <div class="col-md-5 mb-4">
                            <div class="container shadow rounded">
                            <div class="row pt-2 ">
                            <img id="#MainImg" src="product/{{$product->image}}" alt="img" style="width: 100%;border-radius: 0.5rem;"/>
                            </div>
                            <div class="row mt-2 pb-2">
{{--                                @dd($productPhotos)--}}
{{--                                @if($productPhotos)--}}
{{--                                @foreach($productPhotos as $photo)--}}
{{--                                <div class="col-sm-3">--}}
{{--                                <img src="product/{{$photo->image}}" alt="img" style="width: 100%;border-radius: 0.5rem"/>--}}
{{--                                </div>--}}
{{--                                @endforeach--}}
{{--                                @endif--}}
                                <div class="small-img-group ">
                                    <div class="small-img-col shadow p-1 rounded">
                                        <img src="product/{{$product->image}}" width="100%" class="small-img" alt="">
                                    </div>
                                    @if($productPhotos)
                                    @foreach($productPhotos as $photo)
                                    <div class="small-img-col shadow p-1 rounded">
                                        <img src="product/{{$photo->image}}" width="100%" class="small-img" alt="">
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-7">

                            <div class="p-title"><h2>{{$product->title}}</h2></div>
                            <div class="p-review">
                                <div class="rating">
{{--                                    <?php--}}
{{--                                    if($avg_rating == 0) {--}}
{{--                                        echo '';--}}
{{--                                    }--}}
{{--                                    elseif($avg_rating == 1.5) {--}}
{{--                                        echo '--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star-half-o"></i>--}}
{{--                                            <i class="fa fa-star-o"></i>--}}
{{--                                            <i class="fa fa-star-o"></i>--}}
{{--                                            <i class="fa fa-star-o"></i>--}}
{{--                                        ';--}}
{{--                                    }--}}
{{--                                    elseif($avg_rating == 2.5) {--}}
{{--                                        echo '--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star-half-o"></i>--}}
{{--                                            <i class="fa fa-star-o"></i>--}}
{{--                                            <i class="fa fa-star-o"></i>--}}
{{--                                        ';--}}
{{--                                    }--}}
{{--                                    elseif($avg_rating == 3.5) {--}}
{{--                                        echo '--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star-half-o"></i>--}}
{{--                                            <i class="fa fa-star-o"></i>--}}
{{--                                        ';--}}
{{--                                    }--}}
{{--                                    elseif($avg_rating == 4.5) {--}}
{{--                                        echo '--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star-half-o"></i>--}}
{{--                                        ';--}}
{{--                                    }--}}
{{--                                    else {--}}
{{--                                    for($i=1;$i<=5;$i++) {--}}
{{--                                        ?>--}}
{{--                                        <?php if($i>$avg_rating): ?>--}}
{{--                                    <i class="fa fa-star-o"></i>--}}
{{--                                    <?php else: ?>--}}
{{--                                    <i class="fa fa-star"></i>--}}
{{--                                    <?php endif; ?>--}}
{{--                                        <?php--}}
{{--                                    }--}}
{{--                                    }--}}
{{--                                    ?>--}}
{{--                                </div>--}}
                            </div>
                            <div class="p-short-des">
                                <p>
                                    {{htmlspecialchars(trim(strip_tags($product->short_description)))}}
                                </p>
                            </div>
                            <form action="" method="post">
                                <div class="p-quantity">
                                    <div class="row">
                                        <div class="col-md-12 mb_20 pt-2">
                                            Select Size<br>
                                            <select name="size_id" class="form-control" style="width: 70px;">
                                                <option value="">size</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 pt-2">
                                                Select Color<br>
                                            <select name="color_id" class="form-control select2" style="width:70px;">
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="p-price pt-2">
                                    <span style="">Product Price</span><br>
                                    <span>
                                        @if($product->old_price)
                                        <del>Rs.{{$product->old_price}}</del>
                                        @endif
                                        Rs.{{$product->current_price}}
                                </span>
                                </div>
                                <input type="hidden" name="p_current_price" value="<!----><?php //////echo $p_current_price; ?><!----><!---->">
                                <input type="hidden" name="p_name" value="<!----><?php //////echo $p_name; ?><!----><!---->">
                                <input type="hidden" name="p_featured_photo" value="<!----><?php //////echo $p_featured_photo; ?><!----><!---->">
                                <div class="p-quantity pt-2">
                                     Quantity<br>
                                    <input type="number" style="width: 70px; height: 30px" step="1" min="1" max="" name="p_qty" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                                </div>
                                <button type="submit" class="btn btn-warning">Add to cart</button>
                                <button type="submit" class="btn btn-dark">Buy now</button>

                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Nav tabs -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Production Description</button>
                                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Conditions</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Return Policy</button>

                                </div>
                            </nav>
                            <div class="tab-content mb-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">{{htmlspecialchars(trim(strip_tags($product->description)))}}</div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">{!! html_entity_decode(htmlspecialchars(trim(strip_tags($product->return_policy)), ENT_QUOTES, 'UTF-8')) !!}</div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">{{htmlspecialchars(trim(strip_tags($product->condition)))}}</div>
                            </div>


                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
        var MainImg = document.getElementById("#MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick= function(){
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick= function(){
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick= function(){
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick= function(){
            MainImg.src = smallimg[3].src;
        }

    </script>
    <script>
        // Get the input element and total span element
        var numberInput = document.getElementById('numberInput');
        var totalSpan = document.getElementById('total');
        var priceInput = document.getElementById('price');

        // Add event listener to input element for input event
        numberInput.addEventListener('input', function() {
            // Parse the input value as a number
            var inputValue = parseFloat(numberInput.value);
            var priceValue = parseFloat(priceInput.textContent);

            // If the input is a valid number, update the total
            if (!isNaN(priceValue)) {
                // Update the total by adding the input value
                // var currentTotal = parseFloat(totalSpan.textContent);
                var newTotal = priceValue * inputValue;

                // Update the total span with the new total
                totalSpan.textContent = "Rs."+newTotal;
            }else {
                // If the input is not a valid number, set total to 0
                totalSpan.textContent = 1;
            }
        });
    </script>

    <script>
        $(document).ready( function () {
            $('#example').DataTable({
                "autoWidth": false,
            });
        } );
    </script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</div>
</body>
</html>
