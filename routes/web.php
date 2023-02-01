<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\Company\RoleController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PharmacyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/dashboard/clear', function () {
    Artisan::call('optimize:clear');
    return 'clear success';
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::group(['middleware' => ['guest']], function () {
            Route::get('/', function () {
                return view('auth.selection');
            })->name('selection');

        });
        Auth::routes();

        Route::get('/pharmacy',[LoginController::class,'showVendorLoginForm'])->name('pharmacy.login-view');
        Route::post('/pharmacy',[LoginController::class,'vendorLogin'])->name('pharmacy.login');

        Route::get('/delivery',[LoginController::class,'showDeliveryLoginForm'])->name('delivery.login-view');
        Route::post('/delivery',[LoginController::class,'deliveryLogin'])->name('delivery.login');

        Route::get('/pharmacy/register',[RegisterController::class,'showVendorRegisterForm'])->name('pharmacy.register-view');
        Route::post('/pharmacy/register',[RegisterController::class,'createVendor'])->name('pharmacy.register');
        Route::get('/dashboard/home', [HomeController::class, 'index'])->name('home');


        Route::prefix('dashboard')->middleware(['auth'])->name('dashboard.')->group(function () {
            Route::resource('users', \App\Http\Controllers\Dashboard\Company\UserController::class);
            Route::resource('pharmacies', \App\Http\Controllers\Dashboard\Company\PharmacyController::class);
            Route::resource('orders', \App\Http\Controllers\Dashboard\Company\OrderController::class)->except(['destroy']);
            Route::resource('roles', RoleController::class)->except(['destroy']);
            Route::resource('vendors', \App\Http\Controllers\Dashboard\Company\VendorController::class)->except(['destroy']);


            Route::get('test',function(){
                // test
            });
        });

    });
