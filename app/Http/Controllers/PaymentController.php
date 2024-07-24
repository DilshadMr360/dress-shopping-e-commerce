<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $user = auth()->user();

        $productItems = [];
        foreach (session('cart') as $id => $details) {
            $product_name = $details['product_name'];
            $unit_amount = $details['price'] * 100; // Stripe expects the amount in cents
            $quantity = $details['quantity'];

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
        return "Thank you for your payment, the seller will reach you.";
    }

    public function cancel()
    {
        return "Payment Canceled";
    }
}
