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

// Route::get('/', function () {
//     return view('admin.login');
// });

//ADMIN LOGGING

Route::get('admin', 'AdminLoginController@login')->middleware('checkAdminLogout');
Route::post('admin', 'AdminLoginController@checkLogin');
Route::get('logout', 'AdminLoginController@logout');
Route::get('admin/home', 'AdminHomeController@index')->name('home')->middleware('checkAdminLogin');
//name('home') for redirect()->route('home') in AdminLoginController, or can redirect directly by redirect('admin/home') but not recommend
//ADMIN GAME MANAGEMENT
Route::prefix('game')->middleware('checkAdminLogin')->group(function () {
    Route::get('index', 'AdminGameController@index');
    Route::get('create', 'AdminGameController@create');
    // Route::post('create', 'ProductController@store');
    // Route::get('edit/{id}', 'ProductController@edit');
    // Route::post('edit/{id}', 'ProductController@update');
    // Route::get('delete/{id}', 'ProductController@destroy');
});