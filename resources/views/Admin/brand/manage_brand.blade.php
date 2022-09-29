@extends('Admin.master')

@section('title')
    Manage Brand Page
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-9" style="margin-top: 70px; margin-left:300px">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Brand Info</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Serial Name</th>
                            <th>Brand Name</th>
                            <th>Brand image</th>
                            <th>Brand Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                        @foreach($brands as $brand)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$brand->name}}</td>
                                <td><img src="{{asset($brand->image)}}" width="100px" height="100px"></td>
                                <td>{{$brand->description}}</td>
                                <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('brand.edit', ['id' => $brand->id])}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('brand.delete', ['id' => $brand->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this')">
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

