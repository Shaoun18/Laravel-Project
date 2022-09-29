<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;

    public function index(){
        return view('Admin.category.add_category');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        Category::newCategory($request);
        return redirect()->back()->with('message', 'Category Info create successfully');
    }

    public function edit($id){
        $this->category = Category::find($id);
        return view('Admin.category.edit_category',['category' => $this->category]);
    }

    public function update(Request $request, $id){
        Category::UpdateCategory($request, $id);
        return redirect('/manage-category')->with('message', 'Category Update successfully');
    }

    public function delete($id){
        Category::deleteCategory($id);
        return redirect('/manage-category')->with('message', 'Category Delete successfully');
    }

    public function manage(){
        $this->category = Category::all();
        return view('Admin.category.manage_category', ['categories' => $this->category]);
    }
}
