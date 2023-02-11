<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FrontEnd\AuthController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
//        \Illuminate\Support\Facades\Config::set('auth.guards.customer.driver', 'session');
        Route::group(['middleware' => ['guest:customer_web']], function () {
            Route::get('/Frontend/login', [AuthController::class, 'login'])->name('Frontend.login');
            Route::get('/Frontend/register', [AuthController::class, 'register'])->name('Frontend.register');
            Route::post('/Frontend/register',[AuthController::class,'register_store'])->name('Frontend.register.store');
            Route::post('/Frontend/login',[AuthController::class,'customerLogin'])->name('Frontend.login.store');
        });

        Route::name('Frontend.')->middleware('change_type')->group(function () {

            Route::get('/', [FrontEndController::class, 'index'])->name('Frontend.home');
            Route::get('/About', [FrontEndController::class, 'about'])->name('Frontend.about');
            Route::get('/contact',[FrontEndController::class, 'contact'])->name('Frontend.contact');
            // contact us
            Route::post('/contact-us', [FrontEndController::class, 'contactUs'])->name('Frontend.contactUs');
        });

        Route::group(['middleware' => ['customer_web.auth']], function () {
//            \Illuminate\Support\Facades\Config::set('auth.guards.customer.driver', 'session');
            Route::get('/testt', function () {
                return auth('customer_web')->user();
            })->name('Frontend.test');


            Route::get('/Frontend/logout', [AuthController::class, 'logout'])->name('Frontend.logout');
            // profile
            Route::get('/account', [FrontEndController::class, 'account'])->name('Frontend.account');
            Route::post('/Frontend/update-profile', [AuthController::class, 'updateProfile'])->name('Frontend.updateProfile');

        });

    });
