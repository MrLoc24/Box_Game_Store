<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Payment\AddPaymentController;
use App\Http\Controllers\Profile\UpdateProfileController;
use App\Http\Controllers\Profile\UpdateDisplayNameController;
use App\Http\Controllers\Profile\UpdateEmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// //MAIN PAGE
Route::get('/', 'UserHomeController@index')->name('homeuser');
Route::get('/home', 'UserHomeController@index');
Route::get('/game/{id}', 'UserHomeController@detail');


//ADMIN LOGGING
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminLoginController@login')->middleware('checkAdminLogout');
    Route::post('/', 'AdminLoginController@checkLogin');
    Route::get('logout', 'AdminLoginController@logout');
    Route::get('home', 'AdminHomeController@index')->name('home')->middleware('checkAdminLogin');
    Route::post('home/{id}', 'AdminHomeController@update');
    Route::post('changePass/{id}', 'AdminHomeController@changePass')->middleware('checkAdminLogin');
});
//name('home') for redirect()->route('home') in AdminLoginController, or can redirect directly by redirect('admin/home') but not recommend
//ADMIN GAME MANAGEMENT
Route::prefix('admin/game')->middleware('checkAdminLogin')->group(function () {
    Route::get('index', 'AdminGameController@index');
    Route::get('view/{id}', 'AdminGameController@view');
    Route::get('create', 'AdminGameController@create');
    Route::post('create', 'AdminGameController@store');
    Route::get('delete/{id}', 'AdminGameController@delete');
    Route::post('editDetail/{id}', 'AdminGameDetailController@update');
    Route::post('editType/{id}', 'AdminGameDetailController@updateType');

    //CRUD for system requirements
    Route::post('editReq/{id}/{os}', 'AdminGameReqController@update');
    Route::post('addReq/{id}', 'AdminGameReqController@addNew');
    Route::get('deleteReq/{id}/{os}', 'AdminGameReqController@delete');
});
//ADMIN CATEGORY MANAGEMENT
Route::prefix('admin/category')->middleware('checkAdminLogin')->group(function () {
    Route::get('view', 'AdminCategoryController@index');
    Route::post('create', 'AdminCategoryController@store');
    Route::get('delete/{id}', 'AdminCategoryController@delete');
    Route::post('edit/{id}', 'AdminCategoryController@edit');
});
//ADMIN USER MANAGEMENT
Route::prefix('admin/user')->middleware('checkAdminLogin')->group(function () {
    Route::get('/', 'AdminUserController@index');
});
//ADMIN ACCOUNT MANAGEMENT
Route::prefix('admin/manager')->middleware('checkAdminLogin')->group(function () {
    Route::get('/', 'AdminAccountController@index');
    Route::post('resetPassword/{id}', 'AdminAccountController@resetPassword');
    Route::get('delete/{id}', 'AdminAccountController@delete');
});
//ADMIN CART MANAGEMENT
Route::prefix('admin/cart')->middleware('checkAdminLogin')->group(function () {
    Route::get('index', 'AdminCartController@index');
    Route::get('index/cartDetails', 'AdminCartController@indexCartDetails');
    // Route::get('view/{id}', 'AdminGameController@view');
    // Route::get('create', 'AdminGameController@create');
    // Route::post('create', 'AdminGameController@store');
    // Route::get('delete/{id}', 'AdminGameController@delete');
    // Route::post('editDetail/{id}', 'AdminGameDetailController@update');
    // Route::post('editType/{id}', 'AdminGameDetailController@updateType');

    //CRUD for system requirements
    // Route::post('editReq/{id}/{os}', 'AdminGameReqController@update');
    // Route::post('addReq/{id}', 'AdminGameReqController@addNew');
    // Route::get('deleteReq/{id}/{os}', 'AdminGameReqController@delete');
});

Route::middleware('guest')->group(function () {

    //start register
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('handleregister')->middleware('checkregister');
    //end register

    //start login
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->middleware('checklogin');
    //end login

    //start forgot password
    Route::get('forget-password', [ForgotPasswordController::class, 'getEmail'])->name('password.request');
    Route::post('forget-password', [ForgotPasswordController::class, 'postEmail'])->name('password.email');
    //end forgot password

    //start reset password
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
    //end reset password

});

Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/profile', function () {
        return view('user.profile.accountsettings');
    })->name('accountsettings');
    Route::post('/profilesettings', [UpdateProfileController::class, 'update'])->name('handleaccountsettings')->middleware('checkupdateprofile');
    Route::post('/profilesettingss', [UpdateDisplayNameController::class, 'update'])->name('handleaccountsettingss')->middleware('checkupdatedisplayname');
    Route::post('/profilesettingsss', [UpdateEmailController::class, 'update'])->name('handleaccountsettingsss')->middleware('checkupdateemail');

    Route::get('payment', [AddPaymentController::class, 'add'])->name('paymentmanagement');
    Route::post('payment', [AddPaymentController::class, 'store'])->middleware('checkaddpayment');

    Route::post('/add-cart', 'CartController@addToCart')->name('addToCart');
    Route::get('/cart', 'CartController@show')->name('cart');
    Route::get('remove-cart/{rowId}', 'CartController@removeCart');
    Route::get('/checkoutCart/{cartTotal}', 'CheckoutController@checkout');
});