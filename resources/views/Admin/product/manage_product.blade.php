@extends('Admin.master')

@section('title')
    Manage Product Page
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-9" style="margin-top: 70px; margin-left:300px">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Product Info</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Serial Name</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Seling Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                        @foreach($products as $product)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->subCategory->name}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('product.detail', ['id' => $product->id])}}" class="btn btn-primary btn-sm" title ="View product Detail">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-success btn-sm" title ="Edit product">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('product.delete', ['id' => $product->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this');" title ="Delete Product">
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

