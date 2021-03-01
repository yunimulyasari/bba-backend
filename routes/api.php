<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*Route::get('/', 'InventoryController@index');
Route::get('/product', 'InventoryController@index')->name('frontProduct');
Route::get('/product/detail/{id}', 'InventoryController@detail')->name('frontDetail');
Route::post('/cart', 'InventoryController@store')->name('frontCart');
Route::get('/inventory-cart', 'InventoryController@show')->name('frontShoppingCart');
Route::post('/checkout', 'InventoryController@checkout')->name('frontCheckout');
Route::post('/delete-cart', 'InventoryController@deleteCart')->name('frontDeleteCart');*/