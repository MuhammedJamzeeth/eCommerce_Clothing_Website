
        <div class="row">
            <div class="col-md-3 shadow">
                <div class="cat mt-2">
                    @foreach($category as $cat)
                        <a href="{{url('/show_cat',$cat->id)}}">
                            <div class="btn-box-cat">
                            <a href="{{url('/show_cat',$cat->id)}}" class="btn-cat">
                                {{$cat->category_name}}
                            </a>
                        </div>
                        </a>

                    @endforeach
                </div>
            </div>
            <div class="col-md-9 mt-2" >
                <section class="product_section layout_padding">
                    <div class="container">
                        <div class="heading_container heading_center">
                            <h2>
                                Category <span></span>
                            </h2>
                        </div>
                        <div class="row">
                            {{--            @dd($products)--}}
{{--                            @if($products)--}}
                            @foreach($products as $product)

                                @if($product->is_active == 0)
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <div class="box">
                                            <div class="option_container">
                                                <div class="options">
{{--                                                    <a href="" class="option1">--}}
{{--                                                        Men's Shirt--}}
{{--                                                    </a>--}}
                                                    <a href="{{route('home.buyNow',$product->id)}}" class="option2">
                                                        Buy Now
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="img-box">
                                                <img src="product/{{$product->image}}" alt="image">
                                            </div>
                                            <div class="detail-box">
                                                <h5>
                                                    {{$product->title}}
                                                </h5>
                                                <h6>
                                                    Rs.{{$product->current_price}}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
{{--                            @else--}}
{{--                                <h2>--}}
{{--                                    <span>404</span> Not found--}}
{{--                                </h2>--}}
{{--                            @endif--}}
                        </div>
                    </div>
            </div>
            </section>

        </div>
        </div>

