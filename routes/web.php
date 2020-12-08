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


Auth::routes();

Route::get('/pizza/search','PizzaController@search');
Route::get('/','PizzaController@index');
Route::resource('pizza','PizzaController')->except(['index','show'])->middleware('auth');
Route::resource('pizza','PizzaController')->only(['index','show']);
Route::resource('cart','CartController')->middleware('auth');
Route::post('/cart/{id}', 'CartController@store')->name('cart.store');
Route::resource('transaction','TransactionController')->middleware('auth');
Route::post('/transaction/{id}', 'TransactionController@store')->name('transaction.store');
Route::resource('user','UserController')->middleware('auth');
Route::get('/home', 'PizzaController@index')->name('home');
