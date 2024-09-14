<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DiscountCode;
use App\Models\Pay;
class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
                    ->with(['items.product', 'discountCode'])
                    ->first();

        return view('cart.index', compact('cart'));
    }
    public function add(Request $request, $productId)
    {
        $user = Auth::user();
        $product = Product::find($productId);
        
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        
        // Retrieve or create the cart for the user
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        
        // Check if the cart already contains the product
        $cartItem = $cart->items()->where('product_id', $productId)->first();
        
        if ($cartItem) {
            // If the item exists, update the quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // If the item does not exist, create a new CartItem
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => $request->quantity, // Use the quantity from the request
                'cart_id' => $cart->id,
                'image' => $product->image, // Assuming the image URL/path is in the product model
            ]);
        }
        
        return redirect()->route('products.index')->with('success', 'Product added to cart.');
    }

    public function applyDiscount(Request $request)
    {
        $request->validate([
            'discount_code' => 'required|string|exists:discount_codes,code',
        ]);
    
        $code = DiscountCode::where('code', $request->discount_code)->first();
    
        if (!$code) {
            return redirect()->route('cart.index')->with('error', 'Invalid discount code.');
        }
    
        $cart = Cart::where('user_id', Auth::id())->first();
        if ($cart) {
            $total = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);
            $discount = ($total * $code->discount_percentage) / 100;
            $discountedTotal = $total - $discount;
            $cart->discount_code_id = $code->id;
            $cart->save();
        }
    
        return redirect()->route('cart.index')->with([
            'success' => 'Discount code applied.',
            'discount_code' => $code->code,
            'discount_percentage' => $code->discount_percentage,
            'discounted_total' => $discountedTotal
        ]);
    }
    

    public function remove($itemId)
    {
        $cartItem = CartItem::find($itemId);

        if ($cartItem && $cartItem->cart->user_id == Auth::id()) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }


}
