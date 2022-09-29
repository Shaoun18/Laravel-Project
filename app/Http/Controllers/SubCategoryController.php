<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private  $categories;

    public function index(){
        $this->categories = Category::all();
        return view('Admin.subcategory.add_subcategory', ['categories' => $this->categories]);
    }

    public function create(Request $request){
        $request -> validate([
            'name' => 'required|unique:sub_categories'
        ]);
        SubCategory::newsubCategory($request);
        return redirect()->back()->with('message', 'SubCategory info create successfully');
    }
    public function edit($id){
        $this->categories = SubCategory::find($id);
        return view('admin.subcategory.edit_subcategory',['subcategory' => $this->categories]);
    }

    public function update(Request $request, $id){
        SubCategory::UpdateSubCategory($request, $id);
        return redirect('/manage-subcategory')->with('message', 'subcategory info update successfully');
    }

    public function delete($id){
        SubCategory::deleteSubCategory($id);
        return redirect('/manage-subcategory')->with('message', 'subcategory delete successfully');
    }

    public function manage(){
        $this->categories = SubCategory::all();
        return view('Admin.subcategory.manage_subcategory', ['subcategories' => $this->categories]);
    }
}
