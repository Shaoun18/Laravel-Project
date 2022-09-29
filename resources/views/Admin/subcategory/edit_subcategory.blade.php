@extends('Admin.master')

@section('title')
    Edit SubCategory Page
@endsection

@section('body')
    <div class="'row">
        <div class="col-lg-9" style="margin-top: 70px; margin-left:300px">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit SubCategory Form</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{route('subcategory.update', ['id' => $subcategory->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">SubCategory name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{$subcategory->name}}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">SubCategory Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="horizontal-email-input">{{$subcategory->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3">SubCategory image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                                <img src="{{asset($subcategory->image)}}" alt="" width="100px" height="100px" />
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="mr-2"><input type="radio" name="status" {{$subcategory->status == 1 ? 'checked' : ' '}} value="1"/>Published</label>
                                <label><input type="radio" name="status" {{$subcategory->status == 0 ? 'checked' : ' '}}  value="0"/>UnPublished</label>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update SubCategory Info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

