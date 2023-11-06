<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
{{--    @include('admin.css')--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .table {
            width: 100%;
            margin-bottom: 1rem;
            }
        .table thead,
        .table td
        {
            padding: 0.9375rem;
            vertical-align: top;
            border-top: 1px solid #2c2e33; }
        .table th{
            padding: 0.9375rem;
            vertical-align: top;
            horiz-align: center;
        }
        .table tbody{
            width: 100%;
            border-top: 2px solid #2c2e33; }

        .heading1 {
            background-color: blue;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%; /* Ensures the container spans the entire width of the page */
          /* Optional: Adds horizontal padding to the container */
        }

        .heading1 > div {
            display: flex;
            align-items: center;
        }


    </style>
</head>
<body">
        <div class="row mb-2 align-items-center justify-content-center">
            <div class="col text-center">
                <img width="100px" style="border-radius: 50%" src="images/logo2.png" alt="#" />
            </div>
        </div>
        <div class="row mb-2 align-items-center justify-content-center">
            <div class="col text-center">
                <h2>Financial Report</h2>
            </div>
        </div>

<div class="container-scroller">
        <div class="main-panel">
            <div class="row mb-1">
                <div class="col-md-2" style="font-size: 12px">
                    Phone: +94 76 737 3653
                </div>
                <div class="col-md-2" style="font-size: 12px">
                    Email: dresscode@gmail.com
                </div>
                <div class="col-md-2" style="font-size: 12px">
                    Address: Matara.
                </div>
            </div>
            <div id="main" class="content-wrapper text-center align-items-center">

                {{--                    Table start--}}
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Annual Report</h4>
                                <div class="table-responsive">
                                    <table id="" class="table">
                                        <thead>
                                        <tr>
                                            <th> No. </th>
                                            <th> Product Name </th>
                                            <th> Quantity </th>
                                            <th> Total Amount </th>
                                            <th> Profit </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($i=0)
                                        @php($totalPrice=0)
                                        @php($totalProfit=0)
                                        @foreach($products as $data)
                                            @php($productPrice = \Illuminate\Support\Facades\DB::table('products')->where('title',$data)->first())
                                            @php($price = $productPrice->current_price * $associativeArray[$data])
                                            @php($i++)
                                            @php($profit = ($price/100)*15)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$data}}</td>
                                                <td>{{$associativeArray[$data]}}</td>
                                                <td>Rs.{{number_format($price,2)}}</td>
                                                <td>Rs.{{number_format($profit,2)}}</td>
                                            </tr>
                                            @php($totalPrice += $price)
                                            @php($totalProfit += $profit)
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <td colspan="3" style="font-weight: bold; text-align: left">Total</td>
                                        <td style="font-weight: bold">Rs.{{number_format($totalPrice,2)}}</td>
                                        <td style="font-weight: bold">Rs.{{number_format($totalProfit,2)}}</td>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="font-size: 11px">
                printed at: {{now()}}
            </div>
        </div>
</div>


        <!-- End custom js for this page -->
</body>
</html>
