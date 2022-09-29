<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Customer;

class UserController extends Controller
{
    private $customer;
    private $order;
    private $orderdetails;

    public function manage()
    {
        return view('Admin.user.manage_user', ['Users' => Customer::all()]);
    }

    public function delete($id)
    {
        $this->orderdetails = OrderDetail::where('customer_id', $id)->get();
        foreach($this->orderdetails as $orderdetail){
            $orderdetail->delete();
        }

        $this->order = Order::where('customer_id', $id)->get();
        foreach($this->order as $orders){
            $orders->delete();
        }

        $this->customer = Customer::find($id);
        $this->customer->delete();

        return redirect('/manage-user')->with('message', 'User Info Delete Successfully');
    }

}
