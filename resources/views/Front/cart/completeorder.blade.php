@extends('Front.master')

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Order</a></li>
                        <li class="active">Status</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body text-center" style="border:1px; color:black">
                        <h2 class="text-center text-success">{{Session::get('messege')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
