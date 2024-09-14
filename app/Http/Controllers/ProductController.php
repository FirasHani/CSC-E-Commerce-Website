<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
class ProductController extends Controller
{
    public function cart()
    {
        $cart = Cart::where('user_id', Auth::id())
                    ->with(['items.product', 'discountCode'])
                    ->first();

        return view('cart.index', compact('cart'));
    }


    public function about()
{
    return view("about");
}    // Show the form to create a new product
    public function create()
    {
  
        $brands = Brand::all(); // Retrieve all brands for the dropdown
        return view('products.create', compact('brands')); // Create a view file for the product creation form
    }
    public function home(){
        $user = Auth::user();
        $products = Product::with('brand')->limit(4)->get(); // Eager load brand data
        $brands = Brand::all();
        return view('products.home', compact('products', 'brands', 'user'));
    }
    
    // Store a newly created product in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }
        
        // Create a new product
        Product::create([
            'name' => $request->input('name'),
            'brand_id' => $request->input('brand_id'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);
    
        // Redirect with a success message
        return redirect()->route('admin.dashboard')->with('success', 'Product created successfully.');
    }
    

    // Optionally, you can add a method to list all products
    public function index()
    {
        $products = Product::with('brand')->get(); // Eager load brand data
        $brands = Brand::all();
        $cart = Cart::where('user_id', Auth::id())
        ->with(['items.product', 'discountCode'])
        ->first();
        return view('products.index', compact('products','brands','cart')); // Create a view file to list all products
    }
}
