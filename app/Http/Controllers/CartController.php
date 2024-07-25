<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function viewCart() {
        // Get the cart items from the session
 $carts = session()->get('cart', []);

     // Validate cart items
     foreach ($carts as $id => $item) {
         // Check if the product still exists in the database
         if (!Products::find($id)) {
             // If not, remove it from the cart
             unset($carts[$id]);
         }
     }

     // Update the cart in the session
     session()->put('cart', $carts);

     // Pass the cart items to the view
     return view('cart.cartItem', compact('carts'));
 }
    /**
     * Display a listing of the resource.
     */
    public function add_to_cart($id)
    {
        // Find the product by ID
        $product = Products::findOrFail($id);

        // Get the current cart from the session or initialize an empty array
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$id])) {
            // If it is, increment the quantity
            $cart[$id]['quantity']++;
        } else {
            // If not, add the product to the cart with quantity 1
            $cart[$id] = [
                "product_name" => $product->product_title,
                "photo" => $product->upload_part_image,
                "price" => $product->price,
                "quantity" => 1
            ];
            // dd($cart);
        }

        // Update the cart in the session
        session()->put('cart', $cart);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function updatecart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] =$request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updates');
        }
    }

    public function removecart(Request $request){

        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product Removed Successfully');
        }
    }

}
