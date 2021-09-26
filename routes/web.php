<?php

use App\Http\Controllers\UserAdminController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/products', function () {
    return Inertia::render('Products');
})->name('products');

Route::middleware(['auth:sanctum', 'verified'])->get('/product', function () {
    return Inertia::render('Product');
})->name('product');
Route::middleware(['auth:sanctum', 'verified'])->get('/cart', function () {
    return Inertia::render('Cart');
})->name('cart');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/;

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function () {
        return Inertia::render('Admin/AdminLogin');
    })->name('Admin');
    Route::middleware(['auth:sanctum'])->get('/admin.dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard')->middleware('is_admin');

    Route::post('admin.login',[UserAdminController::class,'authenticate'])->name('admin.login');

    Route::middleware(['auth:sanctum'])->get('admin.products', function () {
        return Inertia::render('Admin/Products');
    })->name('admin.products')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('admin.addproduct', function () {
        return Inertia::render('Admin/AddProduct');
    })->name('admin.addproduct')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('admin.addbrand', function () {
        return Inertia::render('Admin/AddBrand');
    })->name('admin.addbrand')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('admin.Orders', function () {
        return Inertia::render('Admin/Orders');
    })->name('admin.orders')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->post('admin.addproduct',[ProductController::class, 'AddProduct'])->name('admin.addproduct')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->post('admin.addbrand',[BrandController::class, 'AddBrand'])->name('admin.addbrand')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('admin.getproducts',[ProductController::class, 'getall'])->name('admin.getproducts')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('admin.getOrderAll',[OrderController::class, 'fetchAll'])->name('admin.getOrderAll')->middleware('is_admin');

});