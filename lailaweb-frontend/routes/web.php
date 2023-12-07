<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/category/{slug}/{id}',[CategoryController::class,'index'])->name('category.product');

Route::get('/products/add-to-cart/{id}',[ProductController::class, 'addToCart'])->name('product.addToCart');

Route::get('/products/show-cart',[ProductController::class, 'showCart'])->name('product.showCart');
