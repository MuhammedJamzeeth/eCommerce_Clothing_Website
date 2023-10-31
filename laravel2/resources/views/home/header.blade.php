<header class="header_section">
    <div class="pl-4 pr-4">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html"><img width="250" src="images/logo.png" alt="#" /></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/redirect')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="testimonial.html">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.html">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>

                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item px-1 pt-1" style="font-size: 23px; cursor: pointer;"
                                >
                                <a style="color: black" onmouseover="this.style.color='red';" onmouseout="this.style.color='black';" href="{{url('/add_to_cart')}}"><div class="row">
                                    <div class="col-2"><iconify-icon icon="mdi:cart-outline"></iconify-icon></div>
                                    <div class="col-2" style="font-size: 12px;padding-left: 6px">(Rs.1000000)</div>
                                </div>
                                </a>
                            </li>
                            <li class="nav-item dropdown" style="font-size: 10px; padding-left: 6px">
                                <div class="row" id="profileDropdown" data-toggle="dropdown" style="cursor: pointer; color: blue;"
                                     onmouseover="this.style.color='red';"
                                     onmouseout="this.style.color='blue';" >
                                <div class="col-2"><img class="img-xs rounded-circle" style="width:30px; height: 30px" src="admin/assets/images/faces/face15.jpg" alt=""></div>
                                <div class="col-9" style="align-items: center;margin: auto;">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                                </div>
{{--                                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">--}}
{{--                                    <div class="container-fluid">--}}
{{--                                        <p class="mb-0 d-none d-sm-block navbar-profile-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                    <h6 class="p-3 mb-0">{{ __('Manage Account') }}</h6>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item" id="settings-link">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-account-circle  text-success"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content" style="padding-left: 24px;">
                                            <a href="{{ route('profile.show') }}"><p class="preview-subject mb-1" style="color: black">Profile</p></a>
                                        </div>

                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item preview-item" @click.prevent="$root.logout()">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-dark rounded-circle">
                                                    <i class="mdi mdi-logout text-danger"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content">
                                                <p class="preview-subject mb-1">Log out</p>
                                            </div>
                                        </button>
                                    </form>
                                    <div class="dropdown-divider"></div>
                                    <p class="p-3 mb-0 text-center">Advanced settings</p>
                                </div>
                            </li>

                        @else
                        <li class="nav-item">
                            <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success bg-dark" href="{{ route('register') }}">Registration</a>
                        </li>
                        @endauth
                        @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
