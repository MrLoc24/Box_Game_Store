<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'UserHomeController@index');
Route::get('/home', 'UserHomeController@index')->name('userhome');
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

Route::middleware('guest')->group(function () {

    //start register
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->middleware('checkregister');
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
    Route::get('/personal', function () {
        return view('user.profile.accountsettings');
    })->name('accountsettings');
    Route::get('payment', [AddPaymentController::class, 'add'])->name('paymentmanagement');
    Route::post('payment', [AddPaymentController::class, 'store'])->middleware('checkaddpayment');
});