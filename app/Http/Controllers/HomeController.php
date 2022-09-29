<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        return view ('Front.home.index',[
            'products' => Product::orderBy('id','desc')->take(6)->get(['id','name','selling_price','image','category_id']),
            'brands' => Brand::all(),
        ]);
    }

    public function category(){
        return view('Front.category.category',[
            'products' => Product::orderBy('id','desc')->take(6)->get(['id','name','selling_price','image','category_id']),
        ]);
    }
    public function details($id){
        return view('Front.product.details',['products' => Product::find($id)]);
    }

    public function contact(){
        return view('Front.home.contact');
    }

    public function error(){
        return view('Front.home.error');
    }
}
