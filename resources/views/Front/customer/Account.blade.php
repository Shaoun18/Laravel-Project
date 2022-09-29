@extends('Front.master')

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Customer Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="py-5 bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{route('customer-profile')}}">My Profile</a> </li>
                            <li class="list-group-item"><a href="{{route('customer-dashboard')}}">My Order</a> </li>
                            <li class="list-group-item"><a href="{{route('customer-Account')}}">My Account</a> </li>
                            <li class="list-group-item"><a href="">Change password</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">Customer Account</div>
                        <div class="card-body">
                            <h5>Customer Account Information</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
