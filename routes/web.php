<?php

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



Auth::routes();
Route::group(['namespace'=>'Front'], function () {

Route::get('/', 'HomeController@index')->name('home');

});
//admin
Route::group(['middleware' => ['admin'],'namespace'=>'Admin','prefix'=>'dashboard','as'=>'admin.'], function () {
    Route::get('/', 'AdminController@index');
    Route::resource('/user','UserController');

});