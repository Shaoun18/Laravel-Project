<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerAuthController extends Controller
{
    private $customer;

    public function login(){
        return view('Front.auth.login');
    }

    public function Register(){
        return view('Front.auth.register');

    }

    public function SignIn(Request $request){
        $this->customer = Customer::where('email', $request->email)->first();
        if($this->customer){
            if(password_verify($request->password, $this->customer->password)){

                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('/customer-dashboard');
            }else{
                return redirect()->back()->with('message', 'Sorry.. your password is invalid');
            }
        }else{
            return redirect()->back()->with('message', 'Sorry.. your email is invalid');
        }
    }

    public function newcustomer(Request $request){
        $this->customer = Customer::newCustomerRegister($request);

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        return redirect('customer-dashboard');

    }

    public function logout(){
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }
}
