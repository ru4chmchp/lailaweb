<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
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

Route::get('/admin', [AdminController::class, 'loginAdmin'])->name('loginadmin');
Route::post('/admin', [AdminController::class, 'postLoginAdmin']);
Route::get('/logout',[AdminController::class,'logout'])->name('logout');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::get('/dashboard', [OrderController::class, 'index'])->name('order.dashboard');
Route::get('/dashboard/product-list/{id}', [OrderController::class, 'detailOrder'])->name('order.detailOrder');
Route::get('/accept/{id}', [OrderController::class, 'acceptOrder'])->name('order.acceptOrder');

Route::prefix('admin')->group(function () {
    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index')->middleware('can:category-list');

        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('can:category-add');

        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');

        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('can:category-edit');

        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete')->middleware('can:category-delete');

        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    });
    Route::prefix('/newsletters')->group(function () {
        Route::get('/', [NewsletterController::class, 'index'])->name('newsletters.index');

        Route::get('/create', [NewsletterController::class, 'create'])->name('newsletters.create');

        Route::post('/store', [NewsletterController::class, 'store'])->name('newsletters.store');

        Route::get('/edit/{id}', [NewsletterController::class, 'edit'])->name('newsletters.edit');

        Route::get('/delete/{id}', [NewsletterController::class, 'destroy'])->name('newsletters.delete');

        Route::post('/update/{id}', [NewsletterController::class, 'update'])->name('newsletters.update');
    });
    Route::prefix('/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index')->middleware('can:product-list');

        Route::get('/create', [ProductController::class, 'create'])->name('products.create');

        Route::post('/store', [ProductController::class, 'store'])->name('products.store');

        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit')->middleware('can:product-edit,id');

        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');

        Route::post('/update/{id}', [ProductController::class, 'update'])->name('products.update');
    });
    Route::prefix('/sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('sliders.index');

        Route::get('/create', [SliderController::class, 'create'])->name('sliders.create');

        Route::post('/store', [SliderController::class, 'store'])->name('sliders.store');

        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('sliders.edit');

        Route::post('/update/{id}', [SliderController::class, 'update'])->name('sliders.update');

        Route::get('/delete/{id}', [SliderController::class, 'destroy'])->name('sliders.delete');
    });
    Route::prefix('/settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings.index');

        Route::get('/create', [SettingController::class, 'create'])->name('settings.create');

        Route::post('/store', [SettingController::class, 'store'])->name('settings.store');

        Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('settings.edit');

        Route::post('/update/{id}', [SettingController::class, 'update'])->name('settings.update');

        Route::get('/delete/{id}', [SettingController::class, 'destroy'])->name('settings.delete');
    });
    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');

        Route::get('/create', [UserController::class, 'create'])->name('users.create');

        Route::post('/store', [UserController::class, 'store'])->name('users.store');

        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');

        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
    });

    Route::prefix('/roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');

        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');

        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');

        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');

        Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');

        Route::get('/delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');

        Route::prefix('/permissions')->group(function () {
            Route::get('/create', [RoleController::class, 'createPermission'])->name('permissions.index');

            Route::post('/store', [RoleController::class, 'storePermission'])->name('permissions.store');
        });
    });

    Route::prefix('/customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');

        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');

        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customers.update');

        Route::get('/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.delete');

    });
});
