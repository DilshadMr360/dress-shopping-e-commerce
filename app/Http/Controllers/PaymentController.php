<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $user = auth()->user();

         // Fetch cart items from the database for the authenticated user
      $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        $productItems = [];
        foreach ($cartItems as $cartItem) {
        $product = $cartItem->product;
        $product_name = $product->product_title;
        $unit_amount = $product->price * 100; // Stripe expects the amount in cents
        $quantity = $cartItem->quantity;

            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency' => 'usd',
                    'unit_amount' => $unit_amount,
                ],
                'quantity' => $quantity,
            ];
        }

        $checkoutSession = $user->checkout($productItems, [
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect()->away($checkoutSession->url);
    }

    public function success()
    {
         // Remove all cart items for the authenticated user after successful payment
         $user = auth()->user();
         Cart::where('user_id', $user->id)->delete();
        return view('payment.success');

    }

    public function cancel()
    {
        return view('payment.cancel');

        return "Payment Canceled";
    }
}
