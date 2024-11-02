<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function storecat(Request $request) { // Corrected here
        $validate_data = $request->validate([
            'category_name' => 'unique:category_models|max:100|min:5',
        ]);

        CategoryModel::create($validate_data);
        
        // You might want to add a redirect or response here
        return redirect()->back()->with('success', 'Category added successfully!');
    }
    public function showcat($id) { // Corrected here
        $category_info = CategoryModel::find($id);
        return view('admin.category.edit', compact('category_info'));
    }

    public function updatecat(Request $request, $id){
        $category = CategoryModel::findOrFail($id);
        $validate_data = $request->validate([
            'category_name' => 'unique:category_models|max:100|min:5',
        ]);

        $category->update($validate_data);
        return redirect()->back()->with('message', 'Category updated successfully!');
    }

    public function deletecat($id){
        CategoryModel::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Category deleted successfully!');
    }
}