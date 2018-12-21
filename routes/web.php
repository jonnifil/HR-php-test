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

Route::get('/', 'OrderController@index')->name('home');
Route::get('products', 'ProductController@index')->name('products');
Route::get('temp', 'TemperatureController@index')->name('temp');
Route::get('edit/{id}', 'OrderController@edit')->name('edit_order');
Route::get('show/{id}', 'OrderController@show')->name('show_order');
Route::get('store', 'OrderController@store')->name('order_store');
