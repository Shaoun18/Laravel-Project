<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brand;

    public function index(){
        return view('Admin.brand.add_brand');
    }

    public function create(Request $request){
        $request -> validate([
            'name' => 'required'
        ]);
        Brand::newBrand($request);
        return redirect()->back()->with('message', 'Brand info create successfully');
    }
    public function edit($id){
        $this->brand = Brand::find($id);
        return view('admin.brand.edit_brand',['brand' => $this->brand]);
    }

    public function update(Request $request, $id){
        Brand::UpdateBrand($request, $id);
        return redirect('/manage-brand')->with('message', 'Brand info update successfully');
    }

    public function delete($id){
        Brand::deleteBrand($id);
        return redirect('/manage-brand')->with('message', 'Brand delete successfully');
    }

    public function manage(){
        $this->brand = Brand::all();
        return view('Admin.brand.manage_brand',['brands' => $this->brand]);
    }
}
