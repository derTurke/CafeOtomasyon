<?php

use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\BasketController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\CommentController;
use App\Http\Controllers\web\ImageController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\SettingController;
use App\Http\Controllers\web\SSSController;
use App\Http\Controllers\web\TableController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin/login', [AuthController::class,'login'])->name('login');
Route::post('/admin/logincheck', [AuthController::class, 'logincheck'])->name('logincheck');
Route::middleware('auth')->prefix('admin')->group(function (){
    Route::get('/', [AuthController::class,'index'])->name('home');
    //Category
    Route::prefix('/category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('create', [CategoryController::class, 'create'])->name('create_category');
        Route::post('store', [CategoryController::class, 'store'])->name('store_category');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit_category');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('update_category');
        Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy_category');
    });
    //Product
    Route::prefix('/product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('create', [ProductController::class, 'create'])->name('create_product');
        Route::post('store', [ProductController::class, 'store'])->name('store_product');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit_product');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update_product');
        Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('destroy_product');
    });
    //Product Image
    Route::prefix('/image')->group(function(){
        Route::get('create/{product_id}', [ImageController::class, 'create'])->name('create_image');
        Route::post('store/{product_id}', [ImageController::class, 'store'])->name('store_image');
        Route::get('destroy/{id}/{product_id}', [ImageController::class, 'destroy'])->name('destroy_image');
    });
    Route::prefix('/comment')->group(function(){
        Route::get('/{product_id}', [CommentController::class, 'index'])->name('comment');
        Route::get('destroy/{id}/{product_id}', [CommentController::class, 'destroy'])->name('destroy_comment');
    });
    //Table
    Route::prefix('/table')->group(function () {
        Route::get('/', [TableController::class, 'index'])->name('table');
        Route::get('create', [TableController::class, 'create'])->name('create_table');
        Route::get('destroy/{id}', [TableController::class, 'destroy'])->name('destroy_table');
    });
    //Basket
    Route::prefix('/basket')->group(function(){
        Route::get('/', [BasketController::class, 'index'])->name('basket');
        Route::get('destroy/{id}', [BasketController::class, 'destroy'])->name('destroy_basket');
    });
    //SSS
    Route::prefix('/sss')->group(function () {
        Route::get('/', [SSSController::class, 'index'])->name('sss');
        Route::get('create', [SSSController::class, 'create'])->name('create_sss');
        Route::post('store', [SSSController::class, 'store'])->name('store_sss');
        Route::get('edit/{id}', [SSSController::class, 'edit'])->name('edit_sss');
        Route::post('update/{id}', [SSSController::class, 'update'])->name('update_sss');
        Route::get('destroy/{id}', [SSSController::class, 'destroy'])->name('destroy_sss');
    });
    Route::prefix('/setting')->group(function(){
        Route::get('/', [SettingController::class, 'index'])->name('setting');
        Route::post('update', [SettingController::class, 'update'])->name('update_setting');
    });
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
});

