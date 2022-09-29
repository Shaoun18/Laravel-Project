<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(){
        return view('Admin.auth.forgotPassword');
    }
}
