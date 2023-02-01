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
        Route::get('/pharmacy/home', function () {
            return 'this is pharmacy home';
        })->name('pharmacy.home');

            Route::prefix('pharmacy')->middleware(['auth:pharmacy'])->name('pharmacy.')->group(function () {




            });

    });
