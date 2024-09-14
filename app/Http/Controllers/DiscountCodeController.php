<?php
namespace App\Http\Controllers;

use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiscountCodeController extends Controller
{
    public function showGenerateForm()
    {
        $discountCodes = DiscountCode::all();
        return view('generate_discount', compact('discountCodes'));
    }

    public function generateCode()
    {
        $code = Str::random(10); // Generate a random 10-character code

        // Ensure the code is unique
        while (DiscountCode::where('code', $code)->exists()) {
            $code = Str::random(10);
        }

        // Create and store the discount code
        DiscountCode::create([
            'code' => $code,
            'discount_percentage' => 10.00,
        ]);

        return redirect()->route('discount.showGenerateForm')->with('success', 'Discount code generated: ' . $code);
    }
}
