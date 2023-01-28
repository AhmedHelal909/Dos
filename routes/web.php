<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\Company\BranchController;
use App\Http\Controllers\Dashboard\Company\CashBackController;
use App\Http\Controllers\Dashboard\Company\CashOutController;
use App\Http\Controllers\Dashboard\Company\CouponController;
use App\Http\Controllers\Dashboard\Company\CustomerController;
use App\Http\Controllers\Dashboard\Company\DivController;
use App\Http\Controllers\Dashboard\Company\GiftController;
use App\Http\Controllers\Dashboard\Company\OfferController;
use App\Http\Controllers\Dashboard\Company\OrderController;
use App\Http\Controllers\Dashboard\Company\RoleController;
use App\Http\Controllers\Dashboard\Company\SalfnyController;
use App\Http\Controllers\Dashboard\Company\UserController;
use App\Http\Controllers\Dashboard\Company\VendorController;
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
            Route::get('getUsers',[UserController::class,'getUsers'])->name('users.getUsers');
            Route::resource('users', UserController::class)->except(['destroy']);
            Route::get('getRoles',[UserController::class,'getRoles'])->name('users.getRoles');
            Route::resource('roles', RoleController::class)->except(['destroy']);
            Route::get('getBranches',[BranchController::class,'getBranches'])->name('branches.getBranches');
            Route::resource('branches', BranchController::class)->except(['destroy']);
            Route::get('getVendors',[VendorController::class,'getVendors'])->name('vendors.getVendors');
            Route::get('getVendorBranch',[VendorController::class,'getVendorBranch'])->name('vendors.getVendorBranch');
            Route::resource('offers', OfferController::class)->except(['destroy']);
            Route::get('getOffers',[OfferController::class,'getOffers'])->name('offers.getOffers');
            Route::resource('vendors', VendorController::class)->except(['destroy']);
            Route::get('getGifts',[GiftController::class,'getGifts'])->name('gifts.getGifts');

            Route::resource('gifts', GiftController::class)->except(['destroy']);
            Route::get('getCustomers',[CustomerController::class,'getCustomers'])->name('customers.getCustomers');
            Route::get('customerDataAjax',[CustomerController::class,'customerDataAjax'])->name('customers.customerDataAjax');
            Route::resource('customers', CustomerController::class)->except(['destroy']);
            Route::resource('actives', ActiveController::class)->except(['destroy']);
            Route::resource('salfnies', SalfnyController::class)->except(['destroy']);
            Route::get('getLoan',[SalfnyController::class,'getLoan'])->name('salfnies.getLoan');
            Route::get('couponCheckAjax',[CouponController::class,'couponCheckAjax'])->name('coupons.couponCheckAjax');
            Route::resource('coupons', CouponController::class)->except(['destroy']);
            Route::get('getCoupons',[CouponController::class,'getCoupons'])->name('coupons.getCoupons');
            
            Route::resource('ads', AdController::class)->except(['destroy']);
            Route::resource('categories', CategoryController::class)->except(['destroy']);
            Route::resource('taxes', TaxController::class)->except(['destroy']);
            Route::resource('sliders', SliderController::class)->except(['destroy']);
            Route::resource('settings', SettingController::class)->only(['edit','update','index']);
            Route::get('checkOtp',[CustomerController::class,'checkOtp'])->name('customers.checkOtp');
            Route::get('checkWallet',[CustomerController::class,'checkWallet'])->name('customers.checkWallet');
            Route::get('cash_backs',[CashBackController::class,'cash_backs'])->name('cash_backs.cash_backs');
            Route::get('generateOtp',[CustomerController::class,'generateOtp'])->name('customers.generateOtp');
            Route::get('updatStatus',[OrderController::class,'updatStatus'])->name('orders.updatStatus');
            Route::post('updataDeliveryStatus',[OrderController::class,'updataDeliveryStatus'])->name('orders.updataDeliveryStatus');
            Route::resource('orders', OrderController::class)->except(['destroy']);
            Route::resource('cashouts', CashOutController::class)->except(['destroy']);
            Route::get('getCashouts',[CashOutController::class,'getCashouts'])->name('cashouts.getCashouts');
            Route::resource('deliveries', DeliveryController::class)->except(['destroy']);
            Route::get('getOrders',[OrderController::class,'getOrders'])->name('orders.getOrders');
            
            Route::resource('orderdetails', OrderDetailController::class)->except(['destroy']);
            Route::resource('divs', DivController::class)->except(['destroy']);
            Route::get('checkAmount',[DivController::class,'checkAmount'])->name('divs.checkAmount');
            Route::get('getDivs',[DivController::class,'getDivs'])->name('divs.getDivs');
            Route::get('getMoney',[DivController::class,'getMoney'])->name('divs.getMoney');

        });

    });

// Route::get('/home',[HomeController::class,'index'])->name('home');
