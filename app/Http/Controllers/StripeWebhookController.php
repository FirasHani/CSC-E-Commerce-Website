<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sig_header = $request->header('stripe-signature');
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
            Log::info('Checkout session completed', $event);
            switch ($event->type) {
                case 'checkout.session.completed':
                    $session = $event->data->object; // contains a \Stripe\Checkout\Session
                    // Handle the checkout session completion
                    Log::info('Checkout session completed', $session);
                    break;

                case 'payment_intent.succeeded':

                    $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
                    // Handle the payment intent success
                    Log::info('PaymentIntent succeeded', $paymentIntent);
                    break;

                // Handle other event types

                default:
                    Log::warning('Unhandled event type: '.$event->type);
                    break;
            }

            return response()->json(['status' => 'success']);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response()->json(['status' => 'invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response()->json(['status' => 'invalid signature'], 400);
        }
    }
}
