@extends('Front.master')

@section('title')
    Show cart page
@endsection

@section('body')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <h3 class="text-center text-danger">{{Session::get('messege')}}</h3>
                    @php($sum = 0)
                    @php($total = 0)
                    @foreach($products as $product)
                    <tr>
                        <td class="cart_product">
                            <a href="#"><img src="{{asset($product->attributes->image)}}" alt="" height="80px" width="80px"></a>
                        </td>
                        <td class="cart_description">
                            <h4>{{$product->name}}</h4>
                        </td>
                        <td class="cart_price">
                            <h4>{{number_format($product->price)}}<span>&#2547</span></h4>
                        </td>
                        <td class="cart_quantity">
{{--                            <div class="cart_quantity_button">--}}
{{--                                <a class="cart_quantity_up" href="#"> + </a>--}}
{{--                                <input class="cart_quantity_input" type="text" name="qty" value="1" autocomplete="off" size="2" min="1">--}}
{{--                                <a class="cart_quantity_down" href="#"> - </a>--}}
{{--                            </div>--}}
                            <div class="input-group">
                                <form action="{{route('update-to-cart',['id' => $product->id])}}" method="POST">
                                    @csrf
                                <input type="number" class="cart_quantity_input" name="qty" value="{{$product->quantity}}" min="1"/>
                                <button class="btn btn-outline-secondary" type="submit" style="background: #fe980f; color: #fff; display: inline-block;">Update</button>
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($product->quantity * $product->price)}}<span>&#2547</span></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" onclick="return confirm('Are you sure to remove this?');" href="{{route('remove-cart-product', ['id' => $product->id])}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                        @php($total = $sum + ($product->quantity * $product->price))
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="#">Get Quotes</a>
                        <a class="btn btn-default check_out" href="#">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{number_format($total)}}<span> &#2547 </span></span></li>
                            <li>Eco Tax(15%) @php($tax = ($total*15)/100) <span>{{number_format($tax)}}<span> &#2547 </span></span></li>
                            <li>Shipping Cost @php($shipping = 300)<span>{{number_format($shipping)}}<span> &#2547 </span></span></li>
                            <li>Total @php($grandtotal = $total + $tax + $shipping)<span>{{number_format($grandtotal)}}<span> &#2547 </span></span></li>
                        </ul>
                        <?php
                            Session::put('order_total', $grandtotal);
                            Session::put('tax_total', $tax);
                            Session::put('shipping_total', $shipping);
                        ?>
                        <a class="btn btn-default update" href="{{route('home')}}">Continue shopping</a>
                        <a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
