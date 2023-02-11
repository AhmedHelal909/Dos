<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\FrontEnd\FrontEndController;
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
        Route::get('profiles', [ProfileController::class,'index']);
        Route::post('updateProfile',[ProfileController::class,'updateProfile']);
});
});
