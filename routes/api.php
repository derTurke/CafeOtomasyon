<?php

use App\Http\Controllers\AuthController as AuthController;
use App\Http\Controllers\PersonelController;
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


    //Logout
    Route::post('logout',[AuthController::class,'logout']);
});




//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
//});
