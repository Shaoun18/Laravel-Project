<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerDashBoardController extends Controller
{
    private $orders;

    public function index(){
        $this->orders = Order::where('customer_id', Session::get('customer_id'))->orderBy('id','desc')->get();
        return view('Front.customer.home',['orders' => $this->orders]);
    }

    public function profile(){
        return view('Front.customer.profile');
    }

    public function Account(){
        return view('Front.customer.Account');
    }

}
