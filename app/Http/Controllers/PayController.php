<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pay;
use Illuminate\Support\Facades\Auth;
class PayController extends Controller
{
    public function pay(Request $request)
    {
    
    
        $pay = new Pay();
        $pay->user_id = Auth::id();
        $pay->cart_id = $request->cart_id;
        $pay->total = $request->total;
        $pay->discount =23;
        $pay->location = "wqe";
        $pay->save();
    
        // Handle any additional logic such as clearing the cart
    
        return redirect()->route('cart.index')->with('success', 'Purchase completed successfully.');
    }
}