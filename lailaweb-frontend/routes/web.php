<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/register',[UserController::class,'register'])->name('register');

Route::get('/login',[UserController::class,'login'])->name('login');

Route::post('/register',[UserController::class,'postRegister'])->name('postRegister');

Route::post('/login',[UserController::class,'postLogin'])->name('postLogin');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/profile/{id}',[UserController::class,'profile'])->name('profile');

Route::get('/payment/{id}',[ProductController::class,'payment'])->name('payment');

Route::post('/updateProfile/{id}',[UserController::class,'updateProfile'])->name('updateProfile');

Route::get('/intro',[HomeController::class,'intro'])->name('intro');

Route::get('/category/{slug}/{id}',[CategoryController::class,'index'])->name('category.product');

Route::get('/products/add-to-cart/{id}',[ProductController::class, 'addToCart'])->name('product.addToCart');

Route::get('/products/show-cart',[ProductController::class, 'showCart'])->name('product.showCart');

Route::get('/products/update-cart',[ProductController::class, 'updateCart'])->name('product.updateCart');

Route::get('/products/delete-cart',[ProductController::class,'deleteCart'])->name('product.deleteCart');

Route::get('/detail/{slug}/{id}',[ProductController::class,'detail'])->name('detailProduct');

Route::post('/detail/store-review/{id}',[ProductController::class,'storeReview'])->name('storeReview');

Route::post('/checkout', [OrderController::class,'checkout'])->name('process.checkout');

// Route::get('/search', [ProductController::class,'search'])->name('search');

