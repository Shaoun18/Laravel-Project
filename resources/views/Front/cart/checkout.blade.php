@extends('Front.master')

@section('title')
    Checkout Page
@endsection

@section('body')
    <section id="cart_items">
        <div class="container mb-8">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div>
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="shopper-info">
                            <p>Delivery Information</p>
                            <form action="{{route('new-order')}}" method="POST">
                                @csrf
                                @if(isset($Customer->name))
                                <input type="text" readonly value="{{$Customer->name}}" />
                                @else
                                    <input type="text" name="name" placeholder="Full Name">
                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                @endif

                                @if(isset($Customer->email))
                                <input type="email" readonly value="{{$Customer->email}}">
                                @else
                                    <input type="email" name="email" placeholder="Email">
                                    <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                @endif

                                @if(isset($Customer->mobile))
                                <input type="number" readonly value="{{$Customer->mobile}}">
                                @else
                                    <input type="number" name="mobile" placeholder="Mobile Number">
                                    <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                @endif

                                <textarea name="delivery_address" placeholder="Delivery Address"></textarea>
                                <span class="text-danger">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : ''}}</span>

                                <div class="checkout-payment-option">
                                    <h6 class="heading-6 font-weight-400 payment-title">Select Delivery Option</h6>
                                        <div class="single-payment-option">
                                            <label><input type="radio" value="1" name="payment_method">Cash On Delivery</input></label>
                                            <label><input type="radio" value="2" name="payment_method">Online Shipping</input></label>
                                        </div>
                                </div>
                            <button class="btn btn-primary" type="submit">Confirm Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
