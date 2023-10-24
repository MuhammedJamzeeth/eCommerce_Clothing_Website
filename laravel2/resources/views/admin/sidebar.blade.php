<head>
    <style>
        .admin-text {
            /*font-weight: bold;*/
            letter-spacing: 6px;
            color: white;
            font-size: 32px;
            padding-top: 8px;
            /* Adjust the letter spacing as needed */
        }
    </style>
</head>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="pt-2  sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo px-md-5" href="index.html"/><h4 class="admin-text">ADMIN</h4></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><h4 class="admin-text">A</h4></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                        <span>Gold Member</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="index.html">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-cart"></i>
              </span>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('/view_product')}}">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/show_product')}}">Show Product</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('view_category')}}">Add Top Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/view_subcategory')}}">Add End Category</a></li>
                </ul>
            </div>
        </li>

{{--        <li class="nav-item menu-items">--}}
{{--            <a class="nav-link" href="{{url('view_category')}}">--}}
{{--              <span class="menu-icon">--}}
{{--                <i class="mdi mdi-playlist-play"></i>--}}
{{--              </span>--}}
{{--                <span class="menu-title">Category</span>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="ui-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{url('/view_product')}}">Add Product</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{url('/show_product')}}">Show Product</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--        </li>--}}

    </ul>
</nav>
