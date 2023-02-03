<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::group(['middleware' => ['guest:customer']], function () {
            Route::get('/Frontend/login', function () {
                return view('frontend.pages.login.index');
            })->name('Frontend.login');
            Route::get('/Frontend/register', function () {
                return view('frontend.pages.register.index');

            })->name('Frontend.register');
            Route::post('/Frontend/register',[RegisterController::class,'register']);
            Route::post('/Frontend/login',[LoginController::class,'customerLogin']);

        });

        Route::name('Frontend.')->middleware('change_type')->group(function () {

            Route::get('/',function(){
                return view('frontend.pages.home.index');
            })->name('Frontend.home');
            Route::get('/About',function(){
                return view('frontend.pages.about.index');
            })->name('Frontend.about');
            Route::get('/contact',function(){
                return view('frontend.pages.contact.index');
            })->name('Frontend.contact');
            Route::get('/account',function(){
                return view('frontend.pages.account.index');
            })->name('Frontend.account');

        });

    });
