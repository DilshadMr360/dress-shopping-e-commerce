<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display the product form.
     */
    public function product(Request $request)
    {
        $categories = Category::all();

        // Check if the request is a GET request to show the form
        if ($request->isMethod('get')) {
            return view('components.productModal', compact('categories'));
        }
    }

    /**
     * Add a new product.
     */
    public function addProduct(Request $request)
    {

        $product = new Products();

        // Handle file upload
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $uploadProductImage = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('ProductImages', $uploadProductImage, 'public');
            $product->upload_part_image = $uploadProductImage;
        }


        $product->category_id = $request->category_id;
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->price = $request->price;

        $product->save();

        return redirect()->route('allproducts');
    }

    /**
     * Display a listing of the products.
     */
    public function allProducts()
    {
        $products = Products::all();
        // dd($products);
        return view('auth.admin.products.allProducts', compact('products'));
    }



    public function home(){

        $categories = Category::all(); // Fetch all categories from the database
        $products = Products::all(); // Fetch all products or you can fetch some default products to show initially
        return view('pages.home', compact('categories', 'products'));

    }


    public function filterProductsByCategory($category_id){
        $categories = Category::all(); // Fetch all categories to show in the menu
        $products = Products::where('category_id', $category_id)->get(); // Fetch products based on category
        return view('pages.home', compact('categories', 'products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query from the request

        $categories = Category::all(); // Fetch all categories for the menu

        // Search for products by title, description, or price
        $products = Products::where('product_title', 'like', "%$query%")
            ->orWhere('product_description', 'like', "%$query%")
            ->orWhere('price', 'like', "%$query%")
            ->get();

        // Return the search results to the view
        return view('pages.home', compact('categories', 'products'));
    }
}
