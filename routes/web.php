<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\Brandcontroller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController as ControllersBrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
use App\Http\Controllers\DiscountController as ControllersDiscountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingfeeController;
use App\Http\Controllers\UserAdminController;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\User;
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
    return Inertia::render('Dashboard');
})->name('/');

Route::get('/products', function () {
    return Inertia::render('Products');
})->name('products');
Route::get('view/categories', function () {
    return Inertia::render('Categories');
})->name('categories');
Route::get('view/brands', function () {
    return Inertia::render('Brands');
})->name('brands');

Route::get('/product/{product:id}/details',[ProductController::class, 'detailView'])->name('product.view');
Route::middleware(['auth:sanctum', 'verified'])->get('/cart', [CartController::class, 'view'])->name('cart');

Route::middleware(['auth:sanctum', 'verified'])->get('/checkout', function () {
    return Inertia::render('Checkout');
})->name('checkout');

Route::get('/blog', function () {
    return Inertia::render('Blog', ['posts' => Blog::all()]);
})->name('blog');

Route::get('/sale', function () {
    return Inertia::render('Sale');
})->name('sale');

Route::middleware(['auth:sanctum', 'verified'])->get('/address/new', function () {
    return Inertia::render('AddAddress');
})->name('address.new');

Route::middleware(['auth:sanctum'])->get('address/{address:id}/edit',[AddressController::class, 'edit'])->name('products.edit');
Route::middleware(['auth:sanctum'])->post('address/{address:id}/edit',[AddressController::class, 'update'])->name('products.update');

Route::get('discount/get/random',[ControllersDiscountController::class, 'getRand'])->name('discount.random');

Route::middleware(['auth:sanctum'])->post('cart/product/{product:id}/add',[CartController::class, 'addToCart'])->name('addToCart');
Route::middleware(['auth:sanctum'])->get('cart/all',[CartController::class, 'all'])->name('cart.all');
Route::middleware(['auth:sanctum'])->post('cart/product/quantity/update',[CartController::class, 'updateQty'])->name('updateQty');
Route::middleware(['auth:sanctum'])->post('cart/{cart:id}/product/{product:id}/delete',[CartController::class, 'removeProduct'])->name('cart.remove.product');
Route::middleware(['auth:sanctum'])->get('cart/check',[CartController::class, 'check'])->name('cart.check');

Route::middleware(['auth:sanctum'])->post('address/new',[AddressController::class, 'store'])->name('address.create');
Route::middleware(['auth:sanctum'])->get('address/all',[AddressController::class, 'all'])->name('address.all');
Route::middleware(['auth:sanctum'])->delete('address/{address:id}/delete',[AddressController::class, 'remove'])->name('address.remove');

Route::middleware(['auth:sanctum'])->get('myorder',[OrderController::class, 'view'])->name('myorder.view');
Route::middleware(['auth:sanctum'])->post('order/create',[OrderController::class, 'create'])->name('order.create');
Route::middleware(['auth:sanctum'])->post('order/transaction',[OrderController::class, 'transaction'])->name('transaction.create');
Route::middleware(['auth:sanctum'])->post('order/{order:id}/cancel',[OrderController::class, 'cancel'])->name('order.cancel');

Route::middleware(['auth:sanctum'])->get('/{product:id}/buynow', [OrderController::class, 'buynow'])->name('buynow');
Route::middleware(['auth:sanctum'])->post('order/product/{product:id}/create', [OrderController::class, 'buynowCreate'])->name('buynowcreate');

Route::middleware(['auth:sanctum'])->get('discounts/all',[DiscountController::class, 'all'])->name('discount.all');

Route::middleware(['auth:sanctum'])->get('checkpop',[ControllersDiscountController::class, 'checkPop'])->name('checkPop');
Route::middleware(['auth:sanctum'])->post('updatepop',[ControllersDiscountController::class, 'updatePop'])->name('updatePop');

Route::get('products/search',[ProductController::class, 'search'])->name('products.search');
Route::get('products/all',[ProductController::class, 'all'])->name('products.all');
Route::get('products/related',[ProductController::class, 'related'])->name('products.related');
Route::get('products/shopall',[ProductController::class, 'shopAll'])->name('products.shopall');
Route::get('products/sale',[ProductController::class, 'sale'])->name('products.sale');

Route::get('banner/all',[BannerController::class, 'all'])->name('banner.all');
Route::get('categories/all',[ControllersCategoryController::class, 'all'])->name('categories.all');
Route::get('brands/all',[ControllersBrandController::class, 'all'])->name('brands.all');
Route::get('topselling',[ProductController::class, 'topselling'])->name('topselling');
Route::get('newarrivals',[ProductController::class, 'newArrivals'])->name('newarrivals');

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

    Route::middleware(['auth:sanctum'])->get('/admin.banners', function () {
        return Inertia::render('Admin/Banner', ['banners' => Banner::all()]);
    })->name('admin.banners')->middleware('is_admin');

    Route::post('admin.login',[UserAdminController::class,'authenticate'])->name('admin.login');
    Route::post('admin.logout',[UserAdminController::class,'logout'])->name('admin.logout');

    Route::middleware(['auth:sanctum'])->get('products', function () {
        return Inertia::render('Admin/Products', ['products' => Product::all()]);
    })->name('admin.products')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('discounts', function () {
        $discounts = Discount::all();
        return Inertia::render('Admin/Discount', ['discounts' => $discounts->load(['brands', 'categories', 'products'])]);
    })->name('admin.discounts')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('addproduct', function () {
        return Inertia::render('Admin/AddProduct');
    })->name('addproduct')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('blog', function () {
        return Inertia::render('Admin/Blog', ['posts' => Blog::all()]);
    })->name('admin.blog')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('admin.addbrand', function () {
        return Inertia::render('Admin/AddBrand');
    })->name('admin.addbrand')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('brands', function () {
        return Inertia::render('Admin/Brand');
    })->name('admin.brands')->middleware('is_admin');

    // Route::middleware(['auth:sanctum'])->get('Orders', function () {
    //     return Inertia::render('Admin/Orders');
    // })->name('admin.orders')->middleware('is_admin');
    

    Route::middleware(['auth:sanctum'])->get('shipping', function () {
        return Inertia::render('Admin/Shipping', ['fees' => Shipping::all()]);
    })->name('admin.shipping')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('categories', function () {
        return Inertia::render('Admin/Categories');
    })->name('admin.categories')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->post('addproduct',[ProductController::class, 'AddProduct'])->name('add.product')->middleware('is_admin');
   
    Route::middleware(['auth:sanctum'])->post('addbrand',[BrandController::class, 'AddBrand'])->name('addbrand')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->post('/product/new',[ProductsController::class, 'addProduct'])->name('/product/new')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('allproducts', function () {
        return Inertia::render('Admin/Products', ['products' => Product::all()]);
    })->name('allproducts')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('users', function () {
        return Inertia::render('Admin/Users', ['users' => User::all()]);
    })->name('admin.users')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->get('/product/{product:id}/edit',[ProductsController::class, 'editProduct'])->name('editProduct')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->delete('/image/{image:id}/delete',[ProductsController::class, 'deleteProductImage'])->name('deleteProductImage')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->put('/variant/{variant:id}/update',[ProductsController::class, 'updateVariant'])->name('updateVariant')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->delete('/variant/{variant:id}/delete',[ProductsController::class, 'deleteVariant'])->name('deleteVariant')->middleware('is_admin');

    Route::middleware(['auth:sanctum'])->post('/product/{product:id}/update',[ProductsController::class, 'updateProduct'])->name('updateProduct')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->delete('/product/{product:id}/delete',[ProductsController::class, 'deleteProduct'])->name('deleteProduct')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('/product/search',[ProductsController::class, 'search'])->name('search.admin')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->get('/product/outofstock',[ProductsController::class, 'outOfStock'])->name('outofstock.admin')->middleware('is_admin');
    Route::middleware(['auth:sanctum'])->post('/product/markas',[ProductsController::class, 'updateTag'])->name('updateTag')->middleware('is_admin');

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
    Route::middleware(['auth:sanctum'])->get('order/search',[AdminOrderController::class, 'search'])->name('order.search');
    Route::middleware(['auth:sanctum'])->get('order/getby/status',[AdminOrderController::class, 'searchOrders'])->name('order.filter');

    Route::middleware(['auth:sanctum'])->get('discounts/all',[DiscountController::class, 'all'])->name('admin.discount.all');
    Route::middleware(['auth:sanctum'])->post('discounts/create',[DiscountController::class, 'create'])->name('discount.create');
    Route::middleware(['auth:sanctum'])->post('discounts/{discount:id}/update',[DiscountController::class, 'update'])->name('discount.update');
    Route::middleware(['auth:sanctum'])->post('discounts/{discount:id}/add/items',[DiscountController::class, 'attachProduct'])->name('discount.attach');
    Route::middleware(['auth:sanctum'])->post('discounts/{discount:id}/remove/items',[DiscountController::class, 'detachProduct'])->name('discount.detach');
    Route::middleware(['auth:sanctum'])->delete('discounts/{discount:id}/delete',[DiscountController::class, 'delete'])->name('discount.delete');
    Route::middleware(['auth:sanctum'])->get('discounts/search',[DiscountController::class, 'search'])->name('discount.search');

    Route::middleware(['auth:sanctum'])->post('banner/add',[BannerController::class, 'store'])->name('banner.add');
    Route::middleware(['auth:sanctum'])->get('banner/all',[BannerController::class, 'all'])->name('admin.banner.all');
    Route::middleware(['auth:sanctum'])->delete('banner/{banner:id}/delete',[BannerController::class, 'remove'])->name('banner.remove');
    Route::middleware(['auth:sanctum'])->post('banner/{banner:id}/update',[BannerController::class, 'update'])->name('banner.update');

    Route::middleware(['auth:sanctum'])->get('chart/traffic',[ChartController::class, 'traffic'])->name('traffic');
    Route::middleware(['auth:sanctum'])->get('chart/users',[ChartController::class, 'newUserYear'])->name('newuser');
    Route::middleware(['auth:sanctum'])->get('chart/orders',[ChartController::class, 'ordersAll'])->name('orders.chart');
    Route::middleware(['auth:sanctum'])->get('chart/order/day',[ChartController::class, 'orderDataDay'])->name('order.day');
    Route::middleware(['auth:sanctum'])->get('chart/order/month',[ChartController::class, 'orderDataMonth'])->name('order.month');
    Route::middleware(['auth:sanctum'])->get('chart/order/year',[ChartController::class, 'orderDataYear'])->name('order.year');
    Route::middleware(['auth:sanctum'])->get('chart/order/status',[ChartController::class, 'orderStatus'])->name('order.status');

    Route::middleware(['auth:sanctum'])->post('shippingfee/add',[ShippingfeeController::class, 'create'])->name('shippingfee.add');
    Route::middleware(['auth:sanctum'])->post('shippingfee/{shipping:id}/update',[ShippingfeeController::class, 'update'])->name('shippingfee.update');
    Route::middleware(['auth:sanctum'])->delete('shippingfee/{shipping:id}/delete',[ShippingfeeController::class, 'delete'])->name('shippingfee.delete');
    Route::middleware(['auth:sanctum'])->get('shippingfee/calculate',[ShippingfeeController::class, 'calculate'])->name('shippingfee.calculate');
    Route::middleware(['auth:sanctum'])->get('shippingfee/search',[ShippingfeeController::class, 'search'])->name('shippingfee.search');

    Route::middleware(['auth:sanctum'])->post('blog/post/create',[BlogController::class, 'create'])->name('blog.post');
    Route::middleware(['auth:sanctum'])->post('blog/post/{blog:id}/update',[BlogController::class, 'update'])->name('blog.update');
    Route::middleware(['auth:sanctum'])->delete('blog/post/{blog:id}/delete',[BlogController::class, 'delete'])->name('blog.delete');
});