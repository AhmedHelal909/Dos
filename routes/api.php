<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\ProfileController;
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

Route::namespace('Api')->middleware(['lang'])->group(function(){
    /*-------------authentication routes----------------*/
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('forgetPassword',[AuthController::class,'forgetPassword']);
    Route::post('verifiedToken',[AuthController::class,'verifiedToken']);
    Route::post('resetPassword',[AuthController::class,'resetPassword']);
    
    
    
    
    
    /*-------------logined------------------------------*/
    Route::prefix('customer')->middleware(['auth_customer'])->group(function() {
        Route::resource('branches', '\App\Http\Controllers\Api\BranchController');
        Route::resource('offers', '\App\Http\Controllers\Api\OfferController')->only(['index','store']);
        Route::resource('coupons', '\App\Http\Controllers\Api\CouponController')->only(['index','store']);
        Route::resource('gifts', '\App\Http\Controllers\Api\GiftController')->only(['index','store']);
        Route::resource('actives', '\App\Http\Controllers\Api\ActiveController')->only(['index','store']);
        Route::resource('ads', '\App\Http\Controllers\Api\AdController')->only(['index','store']);
        Route::resource('categories', '\App\Http\Controllers\Api\CategoryController')->only(['index','store']);
        Route::get('profiles', [ProfileController::class,'index']);
        Route::post('updateProfile',[ProfileController::class,'updateProfile']);
        
});
});
