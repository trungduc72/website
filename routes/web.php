<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;


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

//FrontEnd
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Search
    Route::post('/search', [HomeController::class, 'search'])->name('search');

//Category
    Route::get('/category/{category_id}', [CategoryProductController::class, 'show_category_home'])->name('category');

//Brand
    Route::get('/brand/{brand_id}', [BrandController::class, 'show_brand_home'])->name('brand');
    
//Detail
    Route::get('/detail/{product_id}', [ProductController::class, 'detail'])->name('detail');

//Card
    Route::post('/save-cart', [CartController::class, 'saveCart'])->name('save-cart');
    Route::get('/show-cart', [CartController::class, 'showCart'])->name('show-cart');
    Route::get('/delete-cart/{rowId}', [CartController::class, 'deleteCart'])->name('delete-cart');
    Route::post('/update-cart-qty/{rowId}', [CartController::class, 'updateCartQty'])->name('update-cart-qty');

//Checkout
    Route::get('/login-checkout', [CheckOutController::class, 'loginCheckOut'])->name('login-checkout');
    Route::post('/login-customer', [CheckOutController::class, 'loginCustomer'])->name('login-customer');
    
    //Signup
    Route::get('/signup', [CheckOutController::class, 'signup'])->name('signup');
    Route::post('/add-customer', [CheckOutController::class, 'addCustomer'])->name('add-customer');
    //Logout
    Route::get('/logout-checkout', [CheckOutController::class, 'logoutCheckout'])->name('logout-checkout');

    //Checkout
    Route::get('/checkout', [CheckOutController::class, 'checkout'])->name('checkout');
    Route::post('/save-checkout-customer', [CheckOutController::class, 'saveCheckoutCustomer'])->name('save-checkout-customer');
    Route::get('/payment', [CheckOutController::class, 'payment'])->name('payment');
    Route::post('/order-place', [CheckOutController::class, 'orderPlace'])->name('order-place');


//BackEnd
    Route::get('/admin-login', [AdminController::class, 'index'])->name('admin_login');
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');

    Route::post('/dashboard', [AdminController::class, 'login'])->name('login_dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

//Category Product
    Route::get('/all-category-product', [CategoryProductController::class, 'all'])->name('all-category-product');
        //add
    Route::get('/add-category-product', [CategoryProductController::class, 'add'])->name('add-category-product');
    Route::post('/add-category-product', [CategoryProductController::class, 'save'])->name('save-category-product');

        //active-unactive
    Route::get('/unactive-category-product/{category_product_id}', [CategoryProductController::class, 'unactive_category_product'])->name('unactive-category-product');
    Route::get('/active-category-product/{category_product_id}', [CategoryProductController::class, 'active_category_product'])->name('active-category-product');

        //edit
    Route::get('/edit-category-product/{category_product_id}', [CategoryProductController::class, 'edit'])->name('edit-category-product');
    Route::post('/update-category-product/{category_product_id}', [CategoryProductController::class, 'update'])->name('update-category-product');
        //delete
    Route::get('/delete-category-product/{category_product_id}', [CategoryProductController::class, 'delete'])->name('delete-category-product');

//Brand
    Route::get('/all-brand', [BrandController::class, 'all'])->name('all-brand');
        //add
    Route::get('/add-brand', [BrandController::class, 'add'])->name('add-brand');
    Route::post('/add-brand', [BrandController::class, 'save'])->name('save-brand');

        //active-unactive
    Route::get('/unactive-brand/{brand_id}', [BrandController::class, 'unactive_brand'])->name('unactive-brand');
    Route::get('/active-brand/{brand_id}', [BrandController::class, 'active_brand'])->name('active-brand');

        //edit
    Route::get('/edit-brand/{brand_id}', [BrandController::class, 'edit'])->name('edit-brand');
    Route::post('/update-brand/{brand_id}', [BrandController::class, 'update'])->name('update-brand');
        //delete
    Route::get('/delete-brand/{brand_id}', [BrandController::class, 'delete'])->name('delete-brand');

//Products
    Route::get('/all-product', [ProductController::class, 'all'])->name('all-product');
        //add
    Route::get('/add-product', [ProductController::class, 'add'])->name('add-product');
    Route::post('/add-product', [ProductController::class, 'save'])->name('save-product');

        //active-unactive
    Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product'])->name('unactive-product');
    Route::get('/active-product/{product_id}', [ProductController::class, 'active_product'])->name('active-product');

        //edit
    Route::get('/edit-product/{product_id}', [ProductController::class, 'edit'])->name('edit-product');
    Route::post('/update-product/{product_id}', [ProductController::class, 'update'])->name('update-product');
        //delete
    Route::get('/delete-product/{product_id}', [ProductController::class, 'delete'])->name('delete-product');

//Order
    Route::get('/manage-order', [CheckOutController::class, 'manageOrder'])->name('manage-order');

    Route::get('/view-order/{order_id}', [CheckOutController::class, 'viewOrder'])->name('view-order');




