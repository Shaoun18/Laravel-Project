<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    private  $unit;

    public function index(){
        return view('Admin.unit.add_unit');
    }

    public function create(Request $request){
        $request -> validate([
            'name' => 'required'
        ]);
        Unit::newUnit($request);
        return redirect()->back()->with('message', 'Unit info create successfully');
    }
    public function edit($id){
        $this->unit = Unit::find($id);
        return view('admin.unit.edit_unit',['unit' => $this->unit]);
    }

    public function update(Request $request, $id){
        Unit::UpdateUnit($request, $id);
        return redirect('/manage-unit')->with('message', 'Unit info update successfully');
    }

    public function delete($id){
        Unit::deleteUnit($id);
        return redirect('/manage-unit')->with('message', 'Unit delete successfully');
    }

    public function manage(){
        $this->unit = Unit::all();
        return view('Admin.unit.manage_unit',['units' => $this->unit]);
    }
}
