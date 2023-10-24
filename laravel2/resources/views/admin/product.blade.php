<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->

    @include('admin.css')
    <link rel="stylesheet" href="admin/assets/css/select2.min.css">

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
            <div id="main" class="content-wrapper ">
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    @if($errors->any())

                        <div class="bg-orange-700 border-l-4 border-orange-500 text-orange-700 p-4 mb-3 rounded" role="alert">
                            <p class="font-bold text-white">Be Warned</p>
                        @foreach($errors->all() as $error)

                                <p class="text-white">{{$error}}</p>
                        @endforeach
                        </div>
                    @endif
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
                                        <select name="cat_id" class="form-control end-cat">
                                            <option value="">Select End Level Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="p_name" class="form-control" value="{{old('p_name')}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Old Price <br><span style="font-size:10px;font-weight:normal;">(In Rupees)</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="p_old_price" value="{{old('p_old_price')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Current Price <span>*</span><br><span style="font-size:10px;font-weight:normal;">(In Rupees)</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" value="{{old('p_current_price')}}" name="p_current_price" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Quantity <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" value="{{old('p_qty')}}" name="p_qty" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Select Size</label>
                                    <div class="col-sm-4">
                                        <select name="size[]" class="form-control select2" multiple="multiple" >
                                            @foreach ($size as $row) {
                                            <option value="{{$row->size_id}}">{{$row->size_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Select Color</label>
                                    <div class="col-sm-4">
                                        <select name="color[]" class="form-control select2 " multiple="multiple">
{{--                                            <?php--}}
{{--                                            $statement = $pdo->prepare("SELECT * FROM tbl_color ORDER BY color_id ASC");--}}
{{--                                            $statement->execute();--}}
{{--                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);--}}
{{--                                            foreach ($result as $row) {--}}
{{--                                                ?>--}}
{{--                                            <option value="<?php echo $row['color_id']; ?>"><?php echo $row['color_name']; ?></option>--}}
{{--                                                <?php--}}
{{--                                            }--}}
{{--                                            ?>--}}
                                            <option>black</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Featured Photo <span>*</span></label>
                                    <div class="col-sm-4" style="padding-top:4px;">
                                        <input type="file" value="{{old('p_featured_photo')}}" name="featured_photo"/>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Other Photos</label>
                                    <div class="col-sm-4" style="padding-top:4px;">
                                        <table id="ProductTable" style="width:100%;">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="upload-btn">
                                                        <input type="file" name="photo[]" style="margin-bottom:5px;">
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
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="p_description" class="form-control"  id="summernote1"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Short Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="p_short_description" class="form-control" id="summernote2"></textarea>
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
                                        <textarea name="p_condition" class="form-control" id="summernote4"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 col-form-label">Return Policy</label>
                                    <div class="col-sm-8">
                                        <textarea name="p_return_policy" class="form-control" id="summernote5"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Is Featured?</label>
                                    <div class="col-sm-8">
                                        <select name="p_is_featured" class="form-control" style="width:auto;">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-3 control-label">Is Active?</label>
                                    <div class="col-sm-8">
                                        <select name="p_is_active" class="form-control" style="width:auto;">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
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
        @include('admin.script')
        <!-- End custom js for this page -->

</body>
</html>
