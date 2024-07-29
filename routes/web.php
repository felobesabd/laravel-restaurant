<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('store', 'OrderController@store')->name('order.store');
});

Route::group(['prefix' => 'menu-items', 'namespace' => 'App\Http\Controllers'], function () {
    Route::post('getItemsSearch', 'MenuItemController@itemSearch')->name('items.search');
    Route::get('/', 'MenuItemController@index')->name('menu-items.index');
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('getClient', 'ClientController@getClient')->name('client.get');
});
