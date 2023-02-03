<?php

use Illuminate\Support\Facades\Route;

Route::get('home',function(){
    return view('frontend.pages.home.index');
});
Route::get('about',function(){
    return view('frontend.pages.about.index');
});