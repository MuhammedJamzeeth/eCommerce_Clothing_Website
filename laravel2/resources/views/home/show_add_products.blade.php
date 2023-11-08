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
        .errorSection{
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .errorMsg{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30%;
            /*height: 60px;*/
            background-color: rgba(255, 0, 0, 0.25);
            border-radius: 0.4rem;
            opacity: 0;
            transform: translateX(-100%);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .errorMrg.show2 {
            opacity: 1;
            transform: translateX(0);
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

<div class="page">
{{--    @if(session('grandTotal'))--}}
{{--        <p>Grand Total: {{ session('grandTotal') }}</p>--}}
{{--    @endif--}}

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                <div class="errorSection">
                    <div id="error-message" class="errorMsg show2"></div>
                </div>
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
                                @auth
                                 <form id="myForm" action="{{url('/addcart',\Illuminate\Support\Facades\Auth::user()->id)}}" method="POST">
                                @else
                                         <form id="myForm" action="" method="POST">
                                             @endauth

                                @csrf
                                <input type="hidden" name="pTitle" value="{{$product->title}}">
                                <div class="p-quantity">
                                    <div class="row">
                                        <div class="col-md-12 mb_20 pt-2">
                                            Select Size<br>
                                            <select id="selectSize" name="size_id" class="form-control" style="width: 70px;">
                                                @foreach($productNames as $productName)
                                                <option value="{{$productName->size}}">{{$productName->size}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @auth
                                            <input type="hidden" value="1" id="userIn">
                                        @else
                                            <input type="hidden" value="0" id="userIn">
                                        @endauth
                                        @foreach($productNames as $productName)
{{--                                            @dd($productName)--}}
                                            <input type="hidden" value="{{ $productName->size }}" name="productSizes[]" class="productSizeInput">
                                            <input type="hidden" value="{{ $productName->quantity }}" name="productQuantities[]" class="productQuantityInput">
                                        @endforeach
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
                                    <input id="numQty" type="number" style="width: 70px; height: 30px" step="1" min="1" name="p_qty" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric"> <span id="qty"></span>
                                </div>

                                <button type="button" id="addCart" onclick="validateForm1()" class="btn btn-warning" id="addCart">Add to cart</button>
                            </form>
{{--                                         <form id="myForm2" action="{{'/buyCart'}}" method="POST">--}}
{{--                                             <button type="button" id="buyCart" onclick="validateForm2()" class="btn btn-dark mt-2">Buy now</button>--}}
{{--                                         </form>--}}
                            </div>
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
    <script>

        var productSize=document.querySelectorAll('.productSizeInput');
        var productQuantity=document.querySelectorAll('.productQuantityInput');
        let selectSizes = document.getElementById('selectSize') ;
        var qtyIn = document.getElementById('qty');
        var numQ = document.getElementById('numQty');
        var addCart = document.getElementById('addCart');
        var checkQty;
        var buyCart = document.getElementById('buyCart');



        console.log(productSize);
        console.log(productQuantity);

        qtyIn.innerText = "We have only "+productQuantity[0].value+' harry up!!!';
        numQ.max=productQuantity[0].value;

        checkQty = productQuantity[0].value;
        selectSizes.addEventListener('change',function (){
            // var selectedSizeIndex = selectSizes.value;
            for(let i=0;i<productSize.length;i++){
                console.log(i);
                if(productSize[i].value === selectSizes.value){
                    qtyIn.innerText = "We have only "+productQuantity[i].value+" hurry up!!!";
                    checkQty = productQuantity[i].value
                    numQ.max = productQuantity[i].value;
                    break;
                }else {
                    qtyIn.innerText = "Size not found in stock.";
                }

            }
        });
        numQ.addEventListener("input", function() {
            var enteredValue = parseInt(numQ.value);
            if (enteredValue > checkQty) {
                qtyIn.innerText = "Don't exceed "+checkQty+"!!!";
                qtyIn.style.color = "red";
                addCart.disabled = true;
                buyCart.disabled = true;
                numQ.value = checkQty; // Set the value to 100
            } else {
                qtyIn.innerText = "We have only "+checkQty+" hurry up!!!";;
                qtyIn.style.color = "";
                addCart.disabled = false;
                buyCart.disabled = false;

            }
        });

    </script>

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

</div>
</div></body>
</html>
