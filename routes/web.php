<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/allproducts', function () {
    return view('layouts.productlist');
});

Route::get('/', [AuthController::class, 'loginIndex'])->name('loginshow');
Route::get('/register', [AuthController::class, 'registerIndex'])->name('registershow');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/category', [CategoryController::class, 'showCategory'])->name('showcategory');
Route::post('/category', [CategoryController::class, 'addCategory'])->name('addcategory');
Route::get('/allcategories', [CategoryController::class, 'allCategories'])->name('allcategories');

