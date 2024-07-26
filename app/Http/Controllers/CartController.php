<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function viewCart() {
        // Get the cart items from the session
 // Retrieve the cart items from the Cart table
//  $carts = Cart::all();
    $carts = Cart::where('user_id', Auth::id())->get();

 // Validate cart items
 foreach ($carts as $cartItem) {
     // Check if the product still exists in the database
     if (!Products::find($cartItem->product_id)) {
         // If not, remove it from the Cart table
         $cartItem->delete();
     }
 }

 // Retrieve the updated cart items
 $updatedCarts = Cart::where('user_id', Auth::id())->get();
 // Return the view with the validated cart items
 return view('cart.cartItem', ['carts' => $updatedCarts]);
 }
    /**
     * Display a listing of the resource.
     */
    public function add_to_cart($id)
    {
        $product = Products::findOrFail($id);

        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity++;
        } else {
            $cartItem = new Cart();
            $cartItem->user_id = Auth::id();
            $cartItem->product_id = $id;
            $cartItem->quantity = 1;
        }

        $cartItem->save();

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }



    public function updatecart(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            return response()->json(['status' => 'success', 'message' => 'Cart updated successfully']);
        }

        return response()->json(['status' => 'error', 'message' => 'Cart item not found']);
    }

    public function removecart(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();

        if ($cartItem) {
            $cartItem->delete();

            return response()->json(['status' => 'success', 'message' => 'Cart item removed successfully']);
        }

        return response()->json(['status' => 'error', 'message' => 'Cart item not found']);
    }

}
