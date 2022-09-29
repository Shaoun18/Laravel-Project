@extends('Admin.master')

@section('title')
    Manage User Page
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-9" style="margin-top: 70px; margin-left:300px">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Manage User Information</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Serial Name</th>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>Email Address</th>
                            <th>Mobile Number</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                        @foreach($Users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->mobile}}</td>

                                <td>
                                    <a href="{{route('admin-user.delete', ['id' => $user->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this');" title ="Delete order">
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

