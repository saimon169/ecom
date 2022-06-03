<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
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
    return view('welcome');
});
Route::get('/admin',[AdminController::class,'index']);
Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/category',[CategoryController::class,'index']);
    Route::get('/admin/category/manage_category',[CategoryController::class,'manage_category']);
    Route::get('/admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);
    Route::post('/admin/category/manage_category_insert',[CategoryController::class,'manage_category_insert'])->name('category.manage_category_insert');
    Route::get('/admin/category/manage_category_delete/{id}',[CategoryController::class,'manage_category_delete']);

    Route::get('/admin/product',[ProductController::class,'index']);
    Route::get('/admin/product/manage_product',[ProductController::class,'manage_product']);
    Route::get('/admin/product/manage_product/{id}',[ProductController::class,'manage_product']);
    Route::post('/admin/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
    Route::get('/admin/product/manage_product_delete/{id}',[ProductController::class,'manage_product_delete']);

    Route::get('admin/customer',[CustomerController::class,'index']);
    Route::get('admin/customer/show/{id}',[CustomerController::class,'show']);
    Route::get('admin/customer/status/{status}/{id}',[CustomerController::class,'status']);
});
