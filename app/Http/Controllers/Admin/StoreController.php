<?php

namespace App\Http\Controllers\Admin;

use App\Models\StoreModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // Use the correct Auth namespace
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('admin.store.create');
    }

    public function storemanage()
    {
        $userid = Auth::user()->id;
        $stores = StoreModel::where('user_id', $userid)->get();
        return view('admin.store.manage', compact('stores'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validate_data = $request->validate([
            'store_name' => 'required|unique:store_models|max:100|min:5', 
            'slug' => 'required|unique:store_models|max:100',
            'details' => 'required',
        ]);

        // Create a new store record
        StoreModel::create([
            'store_name' => $request->store_name,
            'slug' => $request->slug,
            'details' => $request->details,
            'user_id' => Auth::user()->id, 
        ]);
        
        // Redirect with a success message
        return redirect()->route('admin.store.create')->with('message', 'Store Created successfully!');
    }
}
