<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class StripeController extends Controller
{
  public function saveOrder(Request $request){
    $total = $request->input('total');

    // Save the order with the total price
    $order = Order::create([
        'total_amount' => $total, // Use the total from the request
        'order_date' => now(),
        'cus_id' => auth()->user()->id,
    ]);
    $totalStripe = $total * 100;
    $stripe = new StripeClient(env('STRIPE_SECRET'));
    $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Total Price',
                ],
                'unit_amount' => $totalStripe,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('home',[],true),
        'cancel_url' => route('home',[],true),
    ]);

    // Return the checkout session URL along with the order ID
    return response()->json(['checkoutUrl' => $checkout_session->url, 'orderId' => $order->id]);
}

    public function checkout(Request $request){
      
      Order::create([
        'total_amount' => 100,
        'order_date' => now(),
        'cus_id' => auth()->user()->id,
    ]);

        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
              'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                  'name' => 'T-shirt',
                ],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://localhost:4242/success',
            'cancel_url' => 'http://localhost:4242/cancel',
          ]);

          return redirect($checkout_session->url);
    }
}
