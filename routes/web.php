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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('pizza','PizzaController');
Route::resource('cart','CartController');
Route::post('/cart/{id}', 'CartController@store')->name('cart.store');
Route::resource('transaction','TransactionController');
Route::post('/transaction/{id}', 'TransactionController@store')->name('transaction.store');
Route::resource('user','UserController');

Route::get('/home', 'PizzaController@index')->name('home');
