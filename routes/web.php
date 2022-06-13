<?php

use App\Http\Controllers\web\UserController;
use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\BasketController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\ChefController;
use App\Http\Controllers\web\CommentController;
use App\Http\Controllers\web\ImageController;
use App\Http\Controllers\web\MessageController;
use App\Http\Controllers\web\OrderController;
use App\Http\Controllers\web\OrderDetailController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\ProfileController;
use App\Http\Controllers\web\SettingController;
use App\Http\Controllers\web\SSSController;
use App\Http\Controllers\web\TableController;

use Illuminate\Support\Facades\Route;



Route::get('/eRestaurant/chef', [ChefController::class,'index'])->name('chef');

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
    //Order
    Route::prefix('/order')->group(function(){
        Route::get('/{slug}', [OrderController::class, 'index'])->name('order');
        Route::get('edit/{id}/{slug}', [OrderController::class, 'edit'])->name('edit_order');
        Route::post('update/{id}', [OrderController::class, 'update'])->name('update_order');
        Route::get('destroy/{id}/{slug}', [OrderController::class, 'destroy'])->name('destroy_order');
    });
    //Order Detail
    Route::prefix('/order_detail')->group(function(){
        Route::get('/{order_id}', [OrderDetailController::class, 'index'])->name('order_detail');
        Route::get('destroy/{id}/{order_id}', [OrderDetailController::class, 'destroy'])->name('destroy_order_detail');
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

    Route::prefix('/messages')->group(function (){
        Route::get('/', [MessageController::class, 'index'])->name('messages');
        Route::get('update/{id}', [MessageController::class, 'update'])->name('update_message');
    });

    //Users
    Route::prefix('/users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/create', [UserController::class, 'create'])->name('create_user');
        Route::post('/store', [UserController::class, 'store'])->name('store_user');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit_user');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update_user');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy_user');
    });

    Route::prefix('/profile')->group(function (){
        Route::get('/',[ProfileController::class,'index'])->name('profile');
        Route::post('/profile_update',[ProfileController::class,'profile_update'])->name('profile_update');
        Route::post('/password_update',[ProfileController::class,'password_update'])->name('password_update');
    });

    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
});



