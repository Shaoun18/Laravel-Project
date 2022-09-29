@extends('Admin.master')

@section('title')
    Detail Product Page
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-9" style="margin-top: 70px; margin-left:300px">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Product Details Info</h4>

                    <table class="table table-bordered dt-responsive nowrap">

                        <tr>
                            <th>Product Id</th>
                            <td>{{$product->id}}</td>
                        </tr>

                        <tr>
                            <th>Product Name</th>
                            <td>{{$product->name}}</td>
                        </tr>

                        <tr>
                            <th>Product Code</th>
                            <td>{{$product->code}}</td>
                        </tr>

                        <tr>
                            <th>Product Category Name</th>
                            <td>{{$product->category->name}}</td>
                        </tr>

                        <tr>
                            <th>Product Sub Category Name</th>
                            <td>{{$product->subCategory->name}}</td>
                        </tr>

                        <tr>
                            <th>Product Brand Name</th>
                            <td>{{$product->brand->name}}</td>
                        </tr>

                        <tr>
                            <th>Product Unit Name</th>
                            <td>{{$product->unit->name}}</td>
                        </tr>

                        <tr>
                            <th>Product Regular Price</th>
                            <td>{{$product->regular_price}}</td>
                        </tr>

                        <tr>
                            <th>Product Selling Price</th>
                            <td>{{$product->selling_price}}</td>
                        </tr>

                        <tr>
                            <th>Product Stock Amount</th>
                            <td>{{$product->stock_amount}}</td>
                        </tr>

                        <tr>
                            <th>Product Short Description</th>
                            <td>{{$product->short_description}}</td>
                        </tr>

                        <tr>
                            <th>Product Long Description</th>
                            <td>{{$product->long_description}}</td>
                        </tr>

                        <tr>
                            <th>Product Feature Image</th>
                            <td><img src="{{asset($product->image)}}" alt="" height="200" width="250" /></td>
                        </tr>

                        <tr>
                            <th>Product Sub Images</th>
                            <td>
                                @foreach($product->subImages as $subImage)
                                    <img src="{{asset($subImage->image)}}" alt="" height="200" width="250" />
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <th>Product Publication Status</th>
                            <td>{{$product->status == 1 ? 'Published' : 'UnPublished'}}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection


