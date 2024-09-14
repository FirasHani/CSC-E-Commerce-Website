<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    // Show the form to create a new brand
    public function create()
    {
        return view('brands.create'); // Create a view file for the brand creation form
    }

    // Store a newly created brand in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new brand
        Brand::create([
            'name' => $request->input('name'),
        ]);

        // Redirect with a success message
        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    // Optionally, you can add a method to list all brands
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands')); // Create a view file to list all brands
    }
        // Show the products for a specific brand
        public function show(Brand $brand)
        {
            $products = $brand->products; // Eager load products
            return view('brands.show', compact('brand', 'products'));
        }
}

