<?php

namespace App\Http\Controllers;

use App\Models\SubCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class MasterSubCategoryController extends Controller
{
    public function storesubcat(Request $request){
        $validate_data = $request->validate([
            'subcategory_name' => 'unique:sub_category_models|max:100|min:3',
            'category_id' => 'required|exists:category_models,id' 
        ]);
    
        SubCategoryModel::create($validate_data);
    
        return redirect()->back()->with('message', 'Sub Category added successfully!');
    }  
    public function showsubcat($id) { // Corrected here
        $subcategory_info = SubCategoryModel::find($id);
        return view('admin.subcategory.edit', compact('subcategory_info'));
    }

    public function updatesubcat(Request $request, $id){
        $subcategory = SubCategoryModel::findOrFail($id);
        $validate_data = $request->validate([
            'subcategory_name' => 'unique:sub_category_models|max:100|min:3',
            
        ]);

        $subcategory->update($validate_data);
        return redirect()->back()->with('message', 'Sub Category updated successfully!');
    }

    public function deletesubcat($id){
        SubCategoryModel::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Sub Category deleted successfully!');
    }     
}
