<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\Company\RoleController;
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
        
        Route::get('/merch',[LoginController::class,'showVendorLoginForm'])->name('vendor.login-view');
        Route::post('/merch',[LoginController::class,'vendorLogin'])->name('vendor.login');

        Route::get('/delivery',[LoginController::class,'showDeliveryLoginForm'])->name('delivery.login-view');
        Route::post('/delivery',[LoginController::class,'deliveryLogin'])->name('delivery.login');
        
        Route::get('/merch/register',[RegisterController::class,'showVendorRegisterForm'])->name('vendor.register-view');
        Route::post('/merch/register',[RegisterController::class,'createVendor'])->name('vendor.register');
        Route::get('/dashboard/home', [HomeController::class, 'index']);

        Route::prefix('dashboard')->namespace('Dashboard\Company')->middleware(['auth'])->name('dashboard.')->group(function () {
            Route::resource('users', UserController::class)->except(['destroy']);
            Route::resource('roles', RoleController::class)->except(['destroy']);
            Route::resource('deliveries', DeliveryController::class)->except(['destroy']);
            Route::resource('vendors', VendorController::class)->except(['destroy']);


        });

    });

// Route::get('/home',[HomeController::class,'index'])->name('home');
