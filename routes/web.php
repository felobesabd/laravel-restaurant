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

Route::group(['prefix' => 'menu-items', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'OrderController@index')->name('menu-items.index');
    Route::get('create', 'OrderController@create')->name('menu-items.show');
    Route::post('store', 'OrderController@store')->name('order.store');
    Route::get('edit/{id}', 'OrderController@edit')->name('menu-items.edit');
    Route::post('update/{id}', 'OrderController@update')->name('menu-items.update');
    Route::get('delete/{id}', 'OrderController@destroy')->name('menu-items.destroy');
});

Route::get('getClient', 'OrderController@show')->name('client.show');
