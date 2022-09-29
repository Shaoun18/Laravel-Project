<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SslCommerzPaymentController;
use App\Mail\OrderConfirmationMail;
use Illuminate\Http\Request;
use Cart;
use Session;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Mail;

class CheckoutController extends Controller
{
    private $customer;
    private $order;
    private $orderDetails;
    private $cartproducts;

    public function index(){
        if(Session::get('customer_id')){
            $this->customer = Customer::find(Session::get('customer_id'));
        }else{
            $this->customer = '';
        }
        return view('Front.cart.checkout',['Customer'=>$this->customer]);
    }

    public function newOrder(Request $request)
    {
//        return Session::get('order_total');
//        return $request->all();

        if (Session::get('customer_id')) {
            $this->customer = Customer::find(Session::get('customer_id'));
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|Unique:customers',
                'mobile' => 'required',
                'delivery_address' => 'required',
            ]);

            $this->customer = Customer::newCustomer($request);

            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name', $this->customer->name);
        }

        if ($request->payment_method == 1) {
            $this->order = Order::neworder($this->customer, $request);
            $this->orderDetails = OrderDetail::newDetails($this->customer, $this->order);

            $this->cartproducts = Cart::getContent();
            foreach ($this->cartproducts as $cartproduct){
                Cart::remove($cartproduct->id);
            }

            /*=================mail send code===========*/
            $this->mailbody = [
                'title' => 'Product Purchase Confirmation!!',
                'body' => 'Your Product purchase is complete.Thank you so much using our website for purchasing the product.',
            ];
            Mail::to($this->customer->email)->send(new OrderConfirmationMail($this->mailbody));
            /*=================mail send code===========*/

            return redirect('/complete-order')->with('messege', 'Your order successfully post. Please wait, we will contact with you soon.');
        }elseif($request->payment_method == 2){

            /*=================mail send code===========*/
            $this->mailbody = [
                'title' => 'Product Purchase Confirmation!!',
                'body' => 'Your Product purchase is complete.Thank you so much using our website for purchasing the product.',
            ];
            Mail::to($this->customer->email)->send(new OrderConfirmationMail($this->mailbody));
            /*=================mail send code===========*/

            $sslPayment = new SslCommerzPaymentController();
            $sslPayment->onlinePayment($request, $this->customer);
        }
    }

    public function CompleteOrder(){
        return view('Front.cart.completeorder');
    }
}
