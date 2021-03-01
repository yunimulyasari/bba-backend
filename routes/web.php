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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'InventoryController@index');
Route::get('/product', 'InventoryController@index')->name('frontProduct');;
Route::get('/product/detail/{id}', 'InventoryController@detail')->name('frontDetail');
Route::post('/cart', 'CartController@store')->name('frontCart');
Route::get('/inventory-cart', 'CartController@show')->name('frontShoppingCart');
Route::post('/checkout', 'CartController@checkout')->name('frontCheckout');
Route::post('/delete-cart', 'CartController@deleteCart')->name('frontDeleteCart');