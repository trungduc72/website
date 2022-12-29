<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;


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
Route::get('/admin_login', [AdminController::class, 'index'])->name('admin_login');
Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');

Route::post('/dashboard', [AdminController::class, 'login'])->name('login_dashboard');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

//Category Product
Route::get('/add-category-product', [CategoryProductController::class, 'add'])->name('add-category-product');
Route::get('/all-category-product', [CategoryProductController::class, 'all'])->name('all-category-product');

Route::post('/add-category-product', [CategoryProductController::class, 'save'])->name('save-category-product');

