<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function index(){
        return view('Admin.product.add_product', [
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    public function getSubCategory(){
        $categoryID = $_GET['id'];
        $subcategories = SubCategory::where('category_id', $categoryID)->get();
        return response()->json($subcategories);
    }

    public function create(Request $request)
    {
        $request -> validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'name' => 'required|unique:products,name',
            'code' => 'required|unique:products,code',
            'regular_price' => 'required',
            'selling_price' => 'required',
            'image' => 'required|image',
        ], [
            'category_id.required' => 'This field is must be valided.'
        ]);

        $this->product = Product::newProduct($request);
        SubImage::newSubImage($this->product, $request->file('sub_image'));
        return redirect()->back()->with('message', 'Product info create successfully');
    }

    public function manage(){
        return view('Admin.product.manage_product',['products' => Product::all()]);
    }

    public function detail($id)
    {
        return view('admin.product.detail_product', ['product' => Product::find($id)]);
    }

    public function edit($id)
    {
        return view('admin.product.edit_product', [
            'products' => Product::find($id),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->product = Product::UpdateProduct($request, $id);
        if($request->file('sub_image')){
            SubImage::updateSubImage($this->product, $request->file('sub_image'));
        }
        return redirect('/manage-product')->with('message', 'products info update successfully');
    }

    public function delete($id)
    {
        Product::deleteProduct($id);
        SubImage::deleteSubImage($id);
        return redirect('/manage-product')->with('message', 'products delete successfully');
    }
}
