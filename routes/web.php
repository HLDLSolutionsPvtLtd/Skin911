<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\Brandcontroller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\BrandController as ControllersBrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAdminController;
use App\Models\Discount;
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
Route::middleware(['auth:sanctum'])->get('view/categories', function () {
    return Inertia::render('Categories');
})->name('categories');
Route::middleware(['auth:sanctum'])->get('view/brands', function () {
    return Inertia::render('Brands');
})->name('brands');

Route::middleware(['auth:sanctum', 'verified'])->get('/product/{product:id}/details',[ProductController::class, 'detailView'])->name('product.view');
Route::middleware(['auth:sanctum', 'verified'])->get('/cart', [CartController::class, 'view'])->name('cart');

Route::middleware(['auth:sanctum', 'verified'])->get('/checkout', function () {
    return Inertia::render('Checkout');
})->name('checkout');
Route::middleware(['auth:sanctum', 'verified'])->get('/address/new', function () {
    return Inertia::render('AddAddress');
})->name('address.new');
Route::middleware(['auth:sanctum'])->get('address/{address:id}/edit',[AddressController::class, 'edit'])->name('products.edit');
Route::middleware(['auth:sanctum'])->post('address/{address:id}/edit',[AddressController::class, 'update'])->name('products.update');

Route::middleware(['auth:sanctum'])->get('products/search',[ProductController::class, 'search'])->name('products.search');
Route::middleware(['auth:sanctum'])->get('products/all',[ProductController::class, 'all'])->name('products.all');
Route::middleware(['auth:sanctum'])->get('products/related',[ProductController::class, 'related'])->name('products.related');

Route::middleware(['auth:sanctum'])->get('categories/all',[ControllersCategoryController::class, 'all'])->name('categories.all');
Route::middleware(['auth:sanctum'])->get('brands/all',[ControllersBrandController::class, 'all'])->name('brands.all');
Route::middleware(['auth:sanctum'])->post('cart/product/{product:id}/add',[CartController::class, 'addToCart'])->name('addToCart');
Route::middleware(['auth:sanctum'])->get('cart/all',[CartController::class, 'all'])->name('cart.all');
Route::middleware(['auth:sanctum'])->post('cart/product/quantity/update',[CartController::class, 'updateQty'])->name('updateQty');
Route::middleware(['auth:sanctum'])->post('cart/{cart:id}/product/{product:id}/delete',[CartController::class, 'removeProduct'])->name('cart.remove.product');

Route::middleware(['auth:sanctum'])->post('address/new',[AddressController::class, 'store'])->name('address.new');
Route::middleware(['auth:sanctum'])->get('address/all',[AddressController::class, 'all'])->name('address.all');
Route::middleware(['auth:sanctum'])->delete('address/{address:id}/delete',[AddressController::class, 'remove'])->name('address.remove');

Route::middleware(['auth:sanctum'])->get('myorder',[OrderController::class, 'view'])->name('myorder.view');
Route::middleware(['auth:sanctum'])->post('order/create',[OrderController::class, 'create'])->name('order.create');
Route::middleware(['auth:sanctum'])->post('order/transaction',[OrderController::class, 'transaction'])->name('transaction.create');
Route::middleware(['auth:sanctum'])->post('order/{order:id}/cancel',[OrderController::class, 'cancel'])->name('order.cancel');

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

    Route::middleware(['auth:sanctum'])->get('discounts', function () {
        $discounts = Discount::all();
        return Inertia::render('Admin/Discount', ['discounts' => $discounts]);
    })->name('admin.discounts')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('addproduct', function () {
        return Inertia::render('Admin/AddProduct');
    })->name('addproduct')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('admin.addbrand', function () {
        return Inertia::render('Admin/AddBrand');
    })->name('admin.addbrand')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('brands', function () {
        return Inertia::render('Admin/Brand');
    })->name('admin.brands')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('Orders', function () {
        return Inertia::render('Admin/Orders');
    })->name('admin.orders')->middleware('is_admin');
    

    Route::middleware(['auth:sanctum'])->get('categories', function () {
        return Inertia::render('Admin/Categories');
    })->name('admin.categories')->middleware('is_admin');

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
    Route::middleware(['auth:sanctum'])->get('/product/search',[ProductsController::class, 'search'])->name('search.admin')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('/product/outofstock',[ProductsController::class, 'outOfStock'])->name('search.admin')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->post('/brand/create',[Brandcontroller::class, 'create'])->name('brand.create')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('/brand/all',[Brandcontroller::class, 'all'])->name('/admin.getbrands')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->post('/brand/{brand:id}/update',[Brandcontroller::class, 'update'])->name('/admin.updatebrand')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->delete('/brand/{brand:id}/delete',[Brandcontroller::class, 'delete'])->name('/admin.deletebrand')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->post('/category/create',[CategoryController::class, 'create'])->name('category.create')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('/category/all',[CategoryController::class, 'all'])->name('/admin.getcategorys')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->post('/category/{category:id}/update',[CategoryController::class, 'update'])->name('/admin.updatecategory')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->delete('/category/{category:id}/delete',[CategoryController::class, 'delete'])->name('/admin.deletecategory')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('admin.getproducts',[ProductsController::class, 'getAll'])->name('admin.getproducts')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('getOrderAll',[OrderController::class, 'fetchAll'])->name('getOrderAll')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('order',[AdminOrderController::class, 'view'])->name('order.view');
    Route::middleware(['auth:sanctum'])->put('order/{order:id}/markas',[AdminOrderController::class, 'updateStatus'])->name('order.statusupdate');
    Route::middleware(['auth:sanctum'])->post('order/{order:id}/payment/refund',[AdminOrderController::class, 'refund'])->name('order.refund');
   
    Route::middleware(['auth:sanctum'])->get('discounts/all',[DiscountController::class, 'all'])->name('discount.all');
    Route::middleware(['auth:sanctum'])->post('discounts/create',[DiscountController::class, 'create'])->name('discount.create');
    Route::middleware(['auth:sanctum'])->post('discounts/{discount:id}/update',[DiscountController::class, 'update'])->name('discount.update');
    Route::middleware(['auth:sanctum'])->post('discounts/{discount:id}/add/items',[DiscountController::class, 'attachProduct'])->name('discount.attach');
    Route::middleware(['auth:sanctum'])->post('discounts/{discount:id}/remove/items',[DiscountController::class, 'detachProduct'])->name('discount.detach');
});