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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/sales', 'SalesController@index')->name('sales');
Route::get('/deliveries', 'DeliveriesController@index')->name('deliveries');
Route::get('/stock', 'StockController@index')->name('stock');
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/settings', 'SettingsController@index')->name('settings');

Route::resource('sales', 'SalesController');
Route::resource('deliveries', 'DeliveriesController');
Route::resource('stock', 'StockController');
Route::resource('products', 'ProductsController');
Route::resource('settings', 'SettingsController');