<?php

use App\Http\Controllers\Admin\ProductsController;
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

    Route::middleware(['auth:sanctum'])->get('products', function () {
        return Inertia::render('Admin/Products');
    })->name('admin.products')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('addproduct', function () {
        return Inertia::render('Admin/AddProduct');
    })->name('addproduct')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('admin.addbrand', function () {
        return Inertia::render('Admin/AddBrand');
    })->name('admin.addbrand')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('Orders', function () {
        return Inertia::render('Admin/Orders');
    })->name('admin.orders')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->post('addproduct',[ProductController::class, 'AddProduct'])->name('addproduct')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->post('addbrand',[BrandController::class, 'AddBrand'])->name('addbrand')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->post('/product/new',[ProductsController::class, 'addProduct'])->name('/product/new')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('allproducts', function () {
        return Inertia::render('Admin/Products');
    })->name('allproducts')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('/product/{product:id}/edit',[ProductsController::class, 'editProduct'])->name('editProduct')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->delete('/image/{image:id}/delete',[ProductsController::class, 'deleteProductImage'])->name('deleteProductImage')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->put('/variant/{variant:id}/update',[ProductsController::class, 'updateVariant'])->name('updateVariant')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->delete('/variant/{variant:id}/delete',[ProductsController::class, 'deleteVariant'])->name('deleteVariant')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->post('/product/{product:id}/update',[ProductsController::class, 'updateProduct'])->name('updateProduct')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->delete('/product/{product:id}/delete',[ProductsController::class, 'deleteProduct'])->name('deleteProduct')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('admin.getproducts',[ProductsController::class, 'getAll'])->name('admin.getproducts')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('getOrderAll',[OrderController::class, 'fetchAll'])->name('getOrderAll')->middleware('is_admin');

});