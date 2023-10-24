<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
        #catIn,#catInError{
            height: 50px;
            /*color: white;*/

        }
        #main{
            border-top-left-radius: 15px; /* Adjust the value as needed */
            /*border-top-right-radius: 20px; !* Adjust the value as needed *!*/
        }
        #btnIn{
            height: 50px;

        }
        .formC{
            margin-left: 15%;
            margin-right: 15%;
        }
        .alert-success {
            opacity: 1;
            transition: opacity 1s ease-in-out;
        }
        #catInError::placeholder {
            color: red;
        }
        .container1{
            display: flex;
            justify-content: end;
        }
        .audun_warn {
            color: #ffffff;
            background-color: #ff0000;
            font-family: 'Source Sans Pro', sans-serif;
            border-radius:.5em;
            margin: 10px 0px;
            padding:12px;
            width: 400px;
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
            <div id="main" class="content-wrapper text-center align-items-center">
                <div class="container1">
                    @if(session()->has('message'))
                        <div id="alertDiv" class="audun_success">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            New Category created successfully
                        </div>
                    @endif
                    @if(session()->has('deleteMessage'))
                        <div id="alertDiv" class="audun_warn">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            Category deleted successfully
                        </div>
                    @endif
                </div>
                <div>
                    <h2 class="card-title mb-4 text-center">Add End Category</h2>
                    <form action="{{url('/add_subcategory')}}" method="POST" class="formC">
                        @csrf
                        <div class="row">
                            <div class="col-md-5 form-group ">
                                    <select id="catIn" name="Top_Level_Category" class="form-control">
                                        @if($errors->has('Top_Level_Category'))
                                            <option value=""><span style="color: red">{{$errors->first('Top_Level_Category')}}</span></option>
                                            @else
                                            <option value="">Select Top Level Category</option>
                                        @endif
                                        @foreach ($topCat as $row) {
                                        <option value="{{$row->id}}">{{$row->category_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-md-5 form-group ">
                                @if($errors->has('sub_category_name'))
                                    <input id="catInError" class="mx-auto  form-control" type="text" name="category_name" placeholder="{{$errors->first('sub_category_name')}}">
                                @else
                                    <input id="catIn" class="mx-auto  form-control" type="text" name="sub_category_name" placeholder="Write category name">
                                @endif
                            </div>
                            <div class="col-md-2 form-group">
                                <input id="btnIn" type="submit" class="mx-auto btn btn-success" value="Add category" aria-expanded="false" href="#">
                            </div>
                        </div>
                    </form>
                </div>
                {{--                    Table start--}}
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">End Category Status</h4>
                                <div class="table-responsive">
                                    <table id="" class="table ">
                                        <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> Top Category Name </th>
                                            <th> End Category Name </th>
                                            <th> Created at </th>
                                            <th> Updated </th>
                                            <th> Payment Status </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($datas as $data)
                                            <tr>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->top_category_name}}</td>
                                                <td>{{$data->subcategory_name}}</td>
                                                <td>{{$data->created_at}}</td>
                                                <td>{{$data->updated_at}}</td>
                                                <td>
                                                    {{--                                                    <a onclick="return confirm('Are you sure to DELETE this?')" class="btn btn-danger" ">Delete</a>--}}
                                                    <button type="button" value="{{$data->id}}" data-category="{{$data->category_name}}" class="btn btn-danger deleteCat" >Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--                Table close--}}
            </div>
        </div>
        {{--        Delete Pop Up--}}
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{url("/delete_category")}}">
                            <p>Are you sure want to delete this item?</p>
                            <p>Are you sure you want to delete the following item?</p>
                            <p><strong>ID:</strong> <span id="confirm_id"></span></p>
                            <input type="hidden" name="confirm_id" value="" id="cID">
                            <p><strong>Category Name:</strong> <span id="confirm-category"></span></p>
                            <p style="color:red;">Be careful! This category will be deleted from the category table</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-ok">Delete</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <script>
            $(document).ready(function() {
                // Store the row data when a "Delete" button is clicked
                $('.deleteCat').click(function(e) {
                    e.preventDefault();
                    var id = $(this).val();
                    var category = $(this).data('category');

                    $('#confirm_id').text(id);
                    $('#cID').val(id);

                    $('#confirm-category').text(category);

                    $('#confirm-delete').modal('show');

                    // $('#confirm-delete').modal('show');
                    // Store the data for the specific row
                    $('#confirm-delete-button').data('id', id);
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
        <script>
            import DataTable from 'datatables.net-dt';

            let table = new DataTable('#myTable', {
                // config options...
            });
        </script>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

        <!-- End custom js for this page -->
</body>
</html>
