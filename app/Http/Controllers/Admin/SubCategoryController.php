<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories from the database
        $categories = CategoryModel::all();
        
        // Return the view with categories
        return view('admin.subcategory.create', compact('categories'));
    }
    public function manage(){
        $subcategories = SubCategoryModel::with('category')->get();
        return view('admin.subcategory.manage', compact('subcategories'));
    }
}
