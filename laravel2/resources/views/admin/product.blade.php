<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->

    @include('admin.css')
    <link rel="stylesheet" href="admin/assets/css/select2.min.css">
    <style>
        @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

        .container1{
            display: flex;
            justify-content: end;
        }
        .audun_success {
            color: #ffffff;
            background-color: #01ff00;
            font-family: 'Source Sans Pro', sans-serif;
            border-radius:.5em;
            margin: 10px 0px;
            padding:12px;
            width: 400px;
        }
    </style>

</head>
<body>

<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->

    @include('admin.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div id="main" class="content-wrapper">
                <div class="container1 text-center">
                    @if(session()->has('message'))
                        <div id="alertDiv" class="audun_success">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            Product added successfully
                        </div>
                    @endif
                </div>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
{{--                    @if($errors->any())--}}

{{--                        <div class="bg-orange-700 border-orange-500 text-orange-700 p-4 mb-3 rounded" role="alert">--}}
{{--                            <p class="font-bold text-white">Be Warned</p>--}}
{{--                        @foreach($errors->all() as $error)--}}
{{--                                <p class="text-white">{{$error}}</p>--}}
{{--                        @endforeach--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <?php if($success_message): ?>--}}
                    <div class="callout callout-success">

{{--                        <p><?php echo $success_message; ?></p>--}}
                    </div>
{{--                    <?php endif; ?>--}}


                    <form class="form-horizontal" action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="box box-info">
                            <div class="box-body">
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Top Level Category Name <span>*</span></label>
                                    <div class="col-sm-4">
                                            <select name="Top_Level_Category" class="form-control  top-cat">
                                                <option value="">Select Top Level Category</option>
                                                @foreach ($category as $row) {
                                                <option value="{{$row->id}}">{{$row->category_name}}</option>
                                                @endforeach
                                            </select>
                                        @if($errors->has('Top_Level_Category'))
                                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('Top_Level_Category')}}</span></small>
                                        @endif
                                    </div>
                                </div>
{{--                                <div class="mb-3 row">--}}
{{--                                    <label for="" class="col-sm-3 col-form-label">Mid Level Category Name <span>*</span></label>--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <select name="mcat_id" class="form-control select2 mid-cat">--}}
{{--                                            <option value="">Select Mid Level Category</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">End Level Category Name <span>*</span></label>
                                    <div class="col-sm-4">
                                        <select name="end_level_category" class="form-control end-cat">
                                            <option value="{{old('end_level_category')}}">Select End Level Category</option>
                                            @foreach($subCategory as $row)
                                                <option value="{{$row->id}}">{{$row->subcategory_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('end_level_category'))
                                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('end_level_category')}}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="product_name" class="form-control" value="{{old('product_name')}}">
                                        @if($errors->has('product_name'))
                                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('product_name')}}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Old Price <span style="font-size:10px;font-weight:normal;">(In Rupees)</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="old_price" value="{{old('old_price')}}" class="form-control">
                                        @if($errors->has('old_price'))
                                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('old_price')}}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Current Price <span style="font-size:10px;font-weight:normal;">(In Rupees)</span> <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" value="{{old('current_price')}}" name="current_price" class="form-control">
                                        @if($errors->has('current_price'))
                                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('current_price')}}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Quantity <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" value="{{old('quantity')}}" name="quantity" class="form-control">
                                        @if($errors->has('quantity'))
                                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('quantity')}}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Select Size <span>*</span></label>
                                    <div class="col-sm-4">
                                        <select name="size" class="form-control" >
                                            <option value="">Select size</option>
                                            @foreach ($size as $row) {
                                            <option value="{{$row->size_name}}">{{$row->size_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('size'))
                                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('size')}}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Select Color <span>*</span></label>
                                    <div class="col-sm-4">
                                        <select name="color" class="form-control">
                                            <option value="">Select color</option>
                                            @foreach ($color as $row) {
                                            <option value="{{$row->color_name}}">{{$row->color_name}}</option>
                                            @endforeach
                                            <option>black</option>
                                        </select>
                                        @if($errors->has('color'))
                                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('color')}}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Featured Photo <span>*</span></label>
                                    <div class="col-sm-4" style="padding-top:4px;">
                                        <input type="file" value="{{old('featured_photo')}}" name="featured_photo"/>
                                        @if($errors->has('featured_photo'))
                                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('featured_photo')}}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Other Photos</label>
                                    <div class="col-sm-5" style="padding-top:4px;">
                                        <table id="ProductTable" style="width:100%;">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="upload-btn">
                                                        <input type="file" name="photo[]" style="margin-bottom:5px;" multiple>
                                                    </div>
                                                </td>
                                                <td style="width:28px;"><a href="javascript:void()" class="Delete btn btn-danger btn-xs">X</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="button" id="btnAddNew" value="Add Item" style="margin-top: 5px;margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;" class="btn btn-warning btn-xs">
                                    </div>
                                </div>
{{--                                <div class="mb-3 row">--}}
{{--                                    <label for="" class="col-sm-3 control-label">Other Photos</label>--}}
{{--                                    <div class="col-sm-4" style="padding-top:4px;">--}}
{{--                                        <table id="ProductTable" style="width:100%;">--}}
{{--                                            <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="upload-btn">--}}
{{--                                                        <input type="file" name="photo[]" style="margin-bottom:5px;">--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                                <td style="width:28px;"><a href="javascript:void()" class="Delete btn btn-danger btn-xs">X</a></td>--}}
{{--                                            </tr>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-2">--}}
{{--                                        <input type="button" id="btnAddNew" value="Add Item" style="margin-top: 5px;margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;" class="btn btn-warning btn-xs">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="p_description" class="form-control"  id="summernote1"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Short Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="short_description" class="form-control" id="summernote2"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Features</label>
                                    <div class="col-sm-8">
                                        <textarea name="p_feature" class="form-control" id="summernote3"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Conditions</label>
                                    <div class="col-sm-8">
                                        <textarea name="condition" class="form-control" id="summernote4"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Return Policy</label>
                                    <div class="col-sm-8">
                                        <textarea name="return_policy" class="form-control" id="summernote5"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Is Featured?</label>
                                    <div class="col-sm-8">
                                        <select name="is_featured" class="form-control" style="width:auto;">

                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Is Active?</label>
                                    <div class="col-sm-8">
                                        <select name="is_active" class="form-control" style="width:auto;">

                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @if($errors->has('is_active'))
                                            <small id="emailHelp" class="form-text text-muted"><span style="color: red">{{$errors->first('is_active')}}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form1">Add Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                        </div>

                </div>
            </div>

        </section>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            $("#btnAddNew").click(function () {

                var rowNumber = $("#ProductTable tbody tr").length;

                var trNew = "";

                var addLink = "<div class=\"upload-btn" + rowNumber + "\"><input type=\"file\" name=\"photo[]\"  style=\"margin-bottom:5px;\"></div>";

                var deleteRow = "<a href=\"javascript:void()\" class=\"Delete btn btn-danger btn-xs\">X</a>";

                trNew = trNew + "<tr> ";

                trNew += "<td>" + addLink + "</td>";
                trNew += "<td style=\"width:28px;\">" + deleteRow + "</td>";

                trNew = trNew + " </tr>";

                $("#ProductTable tbody").append(trNew);

            });
            $('#ProductTable').delegate('a.Delete', 'click', function () {
                $(this).parent().parent().fadeOut('slow').remove();
                return false;
            });
        });
    </script>
            <script>
        setTimeout(function () {
            var alertDiv = document.getElementById('alertDiv');
            if (alertDiv) {
                alertDiv.style.opacity = '0';
                setTimeout(function () {
                    alertDiv.style.display = 'none';
                }, 2000); // 1 second for the fade-out animation
            }
        }, 4000); // 5000 milliseconds = 5 seconds
    </script>
        @include('admin.script')
        <!-- End custom js for this page -->

</body>
</html>
