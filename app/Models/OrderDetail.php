<?php

namespace App\Models;

use Faker\Provider\pt_PT\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;

class OrderDetail extends Model
{
    use HasFactory;
    private static $cartproducts;
    private static $orderDetails;

    public static function newDetails($customer, $order){
        self::$cartproducts  = Cart::getContent();
        foreach(self::$cartproducts as $cartproducts)
        {
            self::$orderDetails  = new OrderDetail();
            self::$orderDetails->customer_id  = $customer->id;
            self::$orderDetails->order_id  = $order->id;
            self::$orderDetails->product_id  = $cartproducts->id;
            self::$orderDetails->product_name  = $cartproducts->name;
            self::$orderDetails->product_image  = $cartproducts->attributes->image;
            self::$orderDetails->product_price  = $cartproducts->price;
            self::$orderDetails->product_qty  = $cartproducts->quantity;
            self::$orderDetails->save();
        }
    }
}
