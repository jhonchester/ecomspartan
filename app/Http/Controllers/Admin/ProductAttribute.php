<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAttribute;
use Illuminate\Http\Request;

class ProductAttribute extends Controller
{
    public function index(){
        
        return view('admin.productattribute.create');
    }

    public function manage(){
        $allattributes = DefaultAttribute::all();
        return view('admin.productattribute.manage', compact('allattributes'));
    }
    public function createattribute(Request $request){
        $validate_data = $request->validate([
            'attribute_value' => 'unique:default_attributes|max:100|min:1',
            
        ]);

        DefaultAttribute::create($validate_data);
        return redirect()->back()->with('message', 'Default Attribute Added Successfully');
    }
    public function showattribute($id) { // Corrected here
        $attribute_info = DefaultAttribute::find($id);
        return view('admin.productattribute.edit', compact('attribute_info'));
    }

    public function updateattribute(Request $request, $id){
        $attribute = DefaultAttribute::findOrFail($id);
        $validate_data = $request->validate([
            'attribute_value' => 'unique:default_attributes|max:100|min:1',
        ]);

        $attribute->update($validate_data);
        return redirect()->back()->with('message', 'Attribute updated successfully!');
    }

    public function deleteattribute($id){
        DefaultAttribute::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Attribute deleted successfully!');
    }
}
