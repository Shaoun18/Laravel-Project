@extends('Admin.master')

@section('title')
    Manage unit Page
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-9" style="margin-top: 70px; margin-left:300px">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Unit Info</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Serial Name</th>
                            <th>Unit Name</th>
                            <th>Unit code</th>
                            <th>Unit Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                        @foreach($units as $unit)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$unit->name}}</td>
                                <td>{{$unit->code}}</td>
                                <td>{{$unit->description}}</td>
                                <td>{{$unit->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('unit.edit', ['id' => $unit->id])}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('unit.delete', ['id' => $unit->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this')">
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

