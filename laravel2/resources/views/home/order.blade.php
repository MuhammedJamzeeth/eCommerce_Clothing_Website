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
    <style>
        .divider {
            height: 1px;
            background-color: #ccc; /* Divider color */
            margin: 18px 7px; /* Adjust margin as needed */
        }

    </style>

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
    @php
    $name = explode(' ',$user->name);
    @endphp
    <section>
        <div class="row mt-4 m-3">
            <div class="col-md-7">
                <form action="{{url('/place_order')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">First name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First name" value="{{$name[0]}}">
                            @if($errors->has('first_name'))
                                <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('first_name')}}</span></small>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Last name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{$name[1]}}" required>
                            @if($errors->has('last_name'))
                                <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('last_name')}}</span></small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$user->address}}" placeholder="1234 Main St">
                        @if($errors->has('address'))
                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('address')}}</span></small>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">City</label>
                            <input type="text" name="city" class="form-control">
                            @if($errors->has('city'))
                                <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('city')}}</span></small>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputState">Districts</label>
                            <select id="inputState" name="district" class="form-control">
                                <option selected value="">Choose...</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochi">Kilinochi</option>
                                <option value="Kurunagala">Kurunagala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Moneragala">Moneragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya<">Nuwara Eliya</option>
                                <option value="Polannaruwa">Polannaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="rincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                                <option>...</option>
                            </select>
                            @if($errors->has('district'))
                                <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('district')}}</span></small>
                            @endif
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom05">Zip</label>
                            <input type="text" class="form-control" name="zip" placeholder="Zip">
                            @if($errors->has('zip'))
                                <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('zip')}}</span></small>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}" placeholder="Phone Number">
                            @if($errors->has('phone'))
                                <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('phone')}}</span></small>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Email">
                            @if($errors->has('email'))
                                <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('email')}}</span></small>
                            @endif
                        </div>
                    </div>
            </div>
            <div class="col-md-5">
                <div class="rounded shadow" style="background-color: #b39a8933; padding: 8px">
                    <div class="row">
                        <div class="col-md-9" style="font-weight: bold">Order Summary</div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mt-2" style="">PRODUCT</div>
                        <div class="col-md-4 mt-2" style="">SUBTOTAL</div>
                    </div>
                    <div class="row">
                        @php
                            $grandTotal = 0;
                            $allProduct = [];
                            $allProductPrice = [];
                            $allProductQty = [];
                            $allProductId = [];
                        @endphp
                        @foreach($carts as $cart)
                            @php
                                    $allProductId[] = $cart->p_id;
                                    $u_id = $cart->u_id;
                                    $product = \Illuminate\Support\Facades\DB::table('products')->where('id','=',$cart->p_id)->first();
                                    $price = (float)$cart->qty * (float)$product->current_price;
                                    $output = "Rs." . number_format($price, 2);
                                    $grandTotal = $grandTotal + $price;
                                    $allProduct[] = $product->title;
                                    $allProductPrice[] = $product->current_price;
                                    $allProductQty[] = $cart->qty;
                            @endphp
                            <div class="col-md-8 mt-2 text-w" style="font-size: small; font-weight: bold; color: #555555">{{$product->title}}</div>
                            <div class="col-md-4 mt-2" style="font-weight: bold; color: #555555">{{$output}}</div>
                        @endforeach
                        @php
                        $resultProduct = implode("|",$allProduct);
                        $resultPrice = implode("|",$allProductPrice);
                        $resultQty = implode('|',$allProductQty);
                        $resultId = implode('|',$allProductId);

                        @endphp
                        <input type="hidden" value="{{$u_id}}" name="userid">
                        <input type="hidden" value="{{$resultProduct}}" name="resultProduct">
                        <input type="hidden" value="{{$resultPrice}}" name="resultPrice">
                        <input type="hidden" value="{{$resultQty}}" name="resultQty">
                        <input type="hidden" value="{{$resultId}}" name="allID">
                    </div>
                    <div class="divider"></div> <!-- Divider -->
                    <div class="row">
                        <div class="col-md-8 ml-2 mt-2" style="font-size: small; font-weight: bold; color: #555555">Delivery</div>
                        <div class="col-md-3 ml-2 mt-2" style="font-size: small; font-weight: bold; color: #555555">Free</div>
                    </div>
                    <div class="divider"></div> <!-- Divider -->
                    <div class="row">
                        <div class="col-md-8 ml-2 mt-2" style="font-size: small; font-weight: bold; color: #555555">Total</div>
                        <div class="col-md-3 ml-2 mt-2" style="font-weight: bold; color: #555555">{{"RS.".number_format($grandTotal,2)}}</div>
                        <input type="hidden" value="{{$grandTotal}}" name="grandTotal">
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-8 ml-2 mt-2" style="font-size: small;color: #555555">Secure checkout with WebXpay</div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 ml-2 mt-2"><img class="shadow rounded" src="images/logopay.png" style="width: 70%; border-radius: .2rem" alt="img"></div>
                    </div>
                    <div class="divider"></div> <!-- Divider -->
                    <div class="row">
                        <div class="col-auto ml-2 mt-2" style="font-size: small; color: #555555">
                            Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.
                        </div>
                    </div>
                    <div class="row" style="justify-content: center ;">
                        <div class="col-auto mb-2 ml-2 mt-2" style="justify-content: center ;font-size: small;">

                            <button class="btn btn-primary bg-dark" style="width: 300px; margin: auto; font-weight: bold" type="submit">PLACE ORDER</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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



</body>
</html>
