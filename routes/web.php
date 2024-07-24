<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

// Route::get('/home', function () {
//     return view('pages.home');
// })->name('home');

Route::get('/allproducts', function () {
    return view('layouts.productlist');
});

Route::get('/', [AuthController::class, 'loginIndex'])->name('loginshow');
Route::get('/register', [AuthController::class, 'registerIndex'])->name('registershow');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Categories
Route::post('/category', [CategoryController::class, 'addCategory'])->name('addcategory');
Route::get('/allcategories', [CategoryController::class, 'allCategories'])->name('allcategories');

// Products
Route::get('/products', [ProductsController::class, 'product'])->name('product');
Route::post('/products', [ProductsController::class, 'addProduct'])->name('addproduct');
Route::get('/allproducts', [ProductsController::class, 'allProducts'])->name('allproducts');


//home
Route::get('/home', [ProductsController::class, 'home'])->name('home');
Route::get('/home/category/{category_id}', [ProductsController::class, 'filterProductsByCategory'])->name('home.category');

//search
Route::get('/search', [ProductsController::class, 'search'])->name('search');


//cart
Route::get('/cart', [CartController::class, 'viewCart'])->name('view_cart');
Route::post('/cart/{id}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::patch('/update-cart', [CartController::class, 'updatecart'])->name('updatecart');
Route::delete('/remove-from-cart', [CartController::class, 'removecart'])->name('removecart');


