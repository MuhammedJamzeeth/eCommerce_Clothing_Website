

<div class="main-panel">
    <div id="main" class="content-wrapper rounded-right">
{{--        <div class="row">--}}
{{--            <div class="col-12 grid-margin stretch-card">--}}
{{--                <div class="card corona-gradient-card">--}}
{{--                    <div class="card-body py-0 px-0 px-sm-3">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-4 col-sm-3 col-xl-2">--}}
{{--                                <img src="admin/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-5 col-sm-7 col-xl-8 p-0">--}}
{{--                                <h4 class="mb-1 mb-sm-0">Want even more features?</h4>--}}
{{--                                <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique layouts!</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">--}}
{{--                        <span>--}}
{{--                          <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>--}}
{{--                        </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$countProducts}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$countNew}}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <i class="mdi mdi-cart"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Products</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$pendingOrdersFinal}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$pendingNewOrdersFinal}}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <i class="mdi mdi-note-text"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Pending order</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$completeOrdersFinal}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$completeNewOrdersFinal}}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <iconify-icon icon="mdi:checkbox-outline"></iconify-icon>                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Complete order</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$completeOrders}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$completeNewOrders}}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
{{--                                    <span class="mdi mdi-arrow-top-right icon-item"></span>--}}
                                    <iconify-icon icon="gridicons:checkmark-circle"></iconify-icon>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Complete shipping</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$pendingOrders}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$pendingNewOrders}}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <iconify-icon icon="uiw:loading"></iconify-icon>                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Pending Shipping</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$countUsers}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$countNewUsers}}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <iconify-icon icon="fontisto:persons"></iconify-icon>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Active Customer</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$countTCat}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$countNewTCat}}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <iconify-icon icon="raphael:arrowup"></iconify-icon>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Top Categories</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$countECat}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$countNewECat}}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    {{--                                    <span class="mdi mdi-arrow-top-right icon-item"></span>--}}
                                    <iconify-icon icon="raphael:arrowdown"></iconify-icon>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">End Categories</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$totalOrders}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$totalNewOrders}}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <i class="mdi mdi-note-text"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total order</h6>
                    </div>
                </div>
            </div>
        </div>


    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script>
    function toggleAllCheckboxes() {
        var checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
        var masterCheckbox = document.querySelector('thead input[type="checkbox"]');

        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = masterCheckbox.checked;
        }
    }
</script>
