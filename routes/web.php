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
    // Route::get('view/{id}', 'AdminCategoryController@view');
    // Route::get('create', 'AdminCategoryController@create');
    // Route::get('delete/{id}', 'AdminCategoryController@delete');
});