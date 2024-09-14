<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $user = Auth::user();
    
        // Check if the user is an admin
        if ($user->isAdmin==1) {
            // Redirect to the admin dashboard
        $brands = Brand::all();
        $products = Product::all();
        return view('admin.dashboard', compact('brands', 'products'));
        } else {
            // Redirect to the products index page
            return redirect('products');
        }
    } 
   
    }
