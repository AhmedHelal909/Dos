<?php

use App\Http\Controllers\Dashboard\Vendor\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::get('/vendor/home', [HomeController::class, 'index']);

            Route::prefix('vendor')->namespace('Dashboard\Vendor')->middleware(['auth:vendor'])->name('vendor.')->group(function () {




            });

    });
