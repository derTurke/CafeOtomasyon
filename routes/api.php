<?php

use App\Http\Controllers\AuthController as AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PersonelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\web\ChefController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){

    //Home
    Route::post('getLastOrder',[HomeController::class,'getLastOrder']);


    //Category
    Route::get('getCategories',[CategoryController::class,'getCategories']);
    //Product
    Route::post('getProducts',[ProductController::class,'getProducts']);
    Route::post('getProduct',[ProductController::class,'getProduct']);

    //Basket
    Route::post('addBasket',[ProductController::class,'addBasket']);
    Route::post('getBasket',[ProductController::class,'getBasket']);
    Route::post('deleteBasket',[ProductController::class,'deleteBasket']);
    Route::post('getBasketSummary',[ProductController::class,'getBasketSummary']);
    Route::post('getTables',[ProductController::class,'getTables']);

    //Order
    Route::post('addOrder',[OrderController::class,'addOrder']);
    Route::post('getOrders',[OrderController::class,'getOrders']);
    Route::post('getOrderProductDetail',[OrderController::class,'getOrderProductDetail']);
    Route::post('getOrderDetail',[OrderController::class,'getOrderDetail']);

    //Address
    Route::post('addAddress',[PersonelController::class,'addAddress']);
    Route::post('getAddress',[PersonelController::class,'getAddress']);
    Route::post('getSingleAddress',[PersonelController::class,'getSingleAddress']);
    Route::post('deleteAddress',[PersonelController::class,'deleteAddress']);
    Route::post('editAddress',[PersonelController::class,'editAddress']);

    //Personel Information
    Route::post('personelInformation',[PersonelController::class,'personelInformation']);
    Route::post('updatePersonelInformation',[PersonelController::class,'updatePersonelInformation']);

    //Edit Password
    Route::post('editPassword',[PersonelController::class,'editPassword']);

    //FAQ
    Route::get('faq',[PersonelController::class,'faq']);

    //Privacy Information
    Route::get('privacyInformation',[PersonelController::class,'privacyInformation']);
    //About US
    Route::get('aboutUs',[PersonelController::class,'aboutUs']);
    //Help Desk Information
    Route::post('helpDesk',[PersonelController::class,'helpDesk']);


    //Logout
    Route::post('logout',[AuthController::class,'logout']);
});


Route::get('chefNewOrder',[ChefController::class,'chefNewOrder']);
Route::get('chefPrepareOrder',[ChefController::class,'chefPrepareOrder']);
Route::get('updateNewOrder',[ChefController::class,'updateNewOrder']);


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
//});
