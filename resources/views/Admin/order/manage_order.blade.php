@extends('Admin.master')

@section('title')
    Manage Order Page
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-9" style="margin-top: 70px; margin-left:300px">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Manage Order</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Serial Name</th>
                            <th>Order No</th>
                            <th>Customer Info</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->customer->name. '('.$order->customer->mobile.')'}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->payment_method == 1 ? 'cash on delivery' : 'Online payment'}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    <a href="{{route('admin-order.detail', ['id' => $order->id])}}" class="btn btn-primary btn-sm" title ="View order Detail">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{route('admin-order.view-invoice', ['id' => $order->id])}}" class="btn btn-info btn-sm" title ="View order Invoice" target="_blank">
                                        <i class="fa fa-file-invoice"></i>
                                    </a>
                                    <a href="{{route('admin-order.download-invoice', ['id' => $order->id])}}" class="btn btn-warning btn-sm" title ="Download order Invoice">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    <a href="{{route('admin-order.edit', ['id' => $order->id])}}" class="btn btn-success btn-sm" title ="Edit order">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin-order.delete', ['id' => $order->id])}}" class="btn btn-danger btn-sm {{$order->order_status == "Complete" || $order->order_status == "Processing" ? "disabled" : " "}}" onclick="return confirm('Are you sure to delete this');" title ="Delete order">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

