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
use App\Models\Payment;
use App\Http\Controllers\Payment\UpdatePaymentController;
use App\Http\Controllers\Profile\DeleteUserController;
use App\Http\Controllers\Payment\DeletePaymentController;
use App\Http\Controllers\Payment\PayPalController;
use App\Http\Controllers\Payment\VnPayController;
use App\Http\Controllers\Payment\MomoController;
use App\Http\Controllers\Profile\UpdateUserPasswordController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
//MAIN PAGE
Route::get('/', 'UserHomeController@index')->name('homeuser');
Route::get('/home', 'UserHomeController@index');
Route::get('/game/{id}', 'UserHomeController@detail')->name('details');
Route::get('/browse', 'UserHomeController@browse');
Route::get('/search', 'SearchController@search')->name('search');
Route::get('/browse/{id}', 'UserBrowseController@type')->name('type');
Route::get('/browse/platform/{id}', 'UserBrowseController@platform')->name('platform');

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
    Route::get('delete/{id}', 'AdminUserController@delete');
});
//ADMIN ACCOUNT MANAGEMENT
Route::prefix('admin/manager')->middleware('checkAdminLogin')->group(function () {
    Route::get('/', 'AdminAccountController@index');
    Route::get('resetPassword/{id}', 'AdminAccountController@resetPassword');
    Route::get('delete/{id}', 'AdminAccountController@delete');
    Route::post('addNew', 'AdminAccountController@store');
});
//ADMIN CART MANAGEMENT
Route::prefix('admin/cart')->middleware('checkAdminLogin')->group(function () {
    Route::get('index', 'AdminCartController@index');
    Route::get('index/cartDetails', 'AdminCartController@indexCartDetails');
});

Route::middleware('guest')->group(function () {

    //start register
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('handleregister')->middleware('checkregister');
    //end register

    // Route::middleware('active_user')->group(function () {
    //start login
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->middleware('checklogin');
    //end login

    //start forgot password
    Route::get('/forget-password', [ForgotPasswordController::class, 'getEmail'])->name('password.request');
    Route::post('/forget-password', [ForgotPasswordController::class, 'postEmail'])->name('password.email');
    //end forgot password

    //start reset password
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getPassword'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
    //end reset password
    // });

});

Route::middleware(['auth', 'auth.session', 'active_user'])->group(function () {
    //start logout
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    //end logout

    //start update and delete user
    Route::get('/profile', function () {
        return view('user.profile.accountsettings');
    })->name('accountsettings');
    Route::post('/profilesettings', [UpdateProfileController::class, 'update'])->name('handleaccountsettings')->middleware('checkupdateprofile');
    Route::post('/profilesettingss', [UpdateDisplayNameController::class, 'update'])->name('handleaccountsettingss')->middleware('checkupdatedisplayname');
    Route::post('/profilesettingsss', [UpdateEmailController::class, 'update'])->name('handleaccountsettingsss')->middleware('checkupdateemail');
    Route::get('/profiledelete', [DeleteUserController::class, 'delete'])->name('deleteuser');
    //end update and delete user

    //start update and delete payment
    Route::get('/payment', function () {
        $payments = Payment::all();
        return view('user.profile.paymentmanagement')->with(['payments' => $payments]);
    })->name('paymentmanagement');
    Route::post('/paymentsettings', [AddPaymentController::class, 'store'])->name('addpayment')->middleware('checkaddpayment');
    Route::post('/paymentsettingss', [AddPaymentController::class, 'store1'])->name('addpayment1');
    Route::post('/payment/{id}', [UpdatePaymentController::class, 'store'])->name('updatepayment')->middleware('checkupdatepayment');
    Route::get('/paymentdelete/{id}', [DeletePaymentController::class, 'delete'])->name('deletepayment');
    Route::get('/process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
    Route::get('/success-transaction/{id}', [PayPalController::class, 'successTransaction'])->name('successTransaction');
    Route::get('/cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
    Route::post('/vnpay-payment', [VnPayController::class, 'processTransaction'])->name('vnpayPayment');
    Route::get('/vnpay-success', [VnPayController::class, 'successTransaction'])->name('vnpaySuccess');
    Route::post('/momo-payment', [MomoController::class, 'processTransaction'])->name('momoPayment');
    Route::get('/momo-success/{id}', [MomoController::class, 'successTransaction'])->name('momoSuccess');

    Route::get('/process-transaction1', [PayPalController::class, 'processTransaction1'])->name('processTransaction1');
    Route::get('/success-transaction1/{id}', [PayPalController::class, 'successTransaction1'])->name('successTransaction1');
    Route::get('/cancel-transaction1', [PayPalController::class, 'cancelTransaction1'])->name('cancelTransaction1');
    Route::post('/vnpay-payment1', [VnPayController::class, 'processTransaction1'])->name('vnpayPayment1');
    Route::get('/vnpay-success1', [VnPayController::class, 'successTransaction1'])->name('vnpaySuccess1');
    Route::post('/momo-payment1', [MomoController::class, 'processTransaction1'])->name('momoPayment1');
    Route::get('/momo-success1/{id}', [MomoController::class, 'successTransaction1'])->name('momoSuccess1');
    //end update and delete payment

    //start password and security
    Route::get('/password', function () {
        return view('user.profile.passwordandsecurity');
    })->name('passwordandsecurity');
    Route::post('/updatepassword', [UpdateUserPasswordController::class, 'update'])->name('updatepassword')->middleware('checkupdateuserpassword');
    Route::post('/logouteverywhere', [LoginController::class, 'logoutEverywhere'])->name('logoutEverywhere');
    //end password and security

    //purchase history
    Route::get('/transactions', function () {
        $cartMs = DB::table('cart_master')->where('userID', Auth::user()->userID)->get();
        $trans = array();
        foreach ($cartMs as $cartM) {
            $date = date_format(date_create($cartM->created_at), "d/m/Y");
            $status = $cartM->status;
            $cartDs = DB::table('cart_details')->where('cartId', $cartM->cartId)->get();
            foreach ($cartDs as $cartD) {
                $cartD->date = $date;
                $cartD->status = $status;
                array_push($trans, $cartD);
            }
        }
        return view('user.profile.transactions')->with(['trans' => $trans]);
    })->name('transactions');

    //start cart
    // Route::post('/add-cart', 'CartController@addToCart')->name('addToCart');
    // Route::get('/add-cart/{gameId}', 'CartController@addToCart')->name('addToCart');
    Route::get('/cart', 'CartController@show')->name('cart');
    // Route::get('remove-cart/{rowId}', 'CartController@removeCart');
    // Route::get('/checkoutCart/{cartTotal}', 'CheckoutController@checkout');
    Route::get('/updateCart/{cartId}', 'CheckoutController@update');
});