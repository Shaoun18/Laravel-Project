<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartControlller extends Controller
{
    private $product;

    public function index(Request $request, $id){
        $this->product = Product::find($id);

        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'price' => $this->product->selling_price,
            'quantity' => $request->qty,
            'attributes' => [
                'image' => $this->product->image,
            ],
        ]);
        return redirect('/show-cart');
    }

    public function show(){
        return view('Front.cart.show', [
            'products' => Cart::getContent(),
        ]);
    }

    public function update(Request $request,$id){
        Cart::update($id, [
            'quantity' =>[
                'relative' => false,
                'value' => $request->qty,
            ],
        ]);
        return redirect()->back()->with('messege', 'Cart Product update successfully');
    }

    public function remove($id){
        Cart::remove($id);
        return redirect()->back()->with('messege', 'Cart Product remove successfully');
    }
}
