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
