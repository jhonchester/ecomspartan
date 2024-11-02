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
}