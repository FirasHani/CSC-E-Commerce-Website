<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use App\Models\Pay;
use App\Models\Cart;
use App\Models\User;
class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('pay.payment');
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey('sk_test_51Pfmi5RxWNkAKYkH14mEJo5Oxy4K8TmbG52VQNzzPtMNiGr2f01kNijY70prslIBZWgqKJ0FYI1cbDKq7ZG4lGpk003TeS4X6z');
        if (!$request->has('stripeToken')) {
            // Handle missing token
            $request->session()->flash('error', 'Stripe token is missing');
            return redirect()->route('payment.failure');
        }
        $user = Auth::user();
        if(!$user){
            return redirect()->route('payment.failure');
        }
        try {
            $pay = new Pay();
            Charge::create([
                'amount' =>$request->total, 
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Test Payment',
                'metadata' => [
                    'name' => $user->name,       
                ],
            ]);
          
            $pay->user_id = Auth::id();
            $pay->cart_id = $request->cart_id;
            $pay->total = $request->total;
            $pay->discount =23;
            $pay->location = $request->loc;
            $pay->save();
        

            // Payment successful; store a success message in the session
            $request->session()->flash('success', 'Payment successful!');

            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            // Payment failed; store an error message in the session
            $request->session()->flash('error', $e->getMessage());

            return redirect()->route('payment.failure');
        }
    }
    public function firas(){
        return "test";
    }
    
    public function showPaymentDetails($paymentId)
{
    $pay = Pay::findOrFail($paymentId);
    $cart = Cart::with('items.product')->findOrFail($pay->cart_id);
    $user = User::findOrFail($pay->user_id);

    return view('admin.payment-details', compact('pay', 'cart', 'user'));
}
public function listPayments()
{
    $payments = Pay::with('user')->get();
    return view('admin.payments', compact('payments'));
}
}