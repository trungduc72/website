<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\BrandController;


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
// Route::get('/', function () {
//     return view('adminLayout');
// });

    Route::get('/home', [HomeController::class, 'index'])->name('home');


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

