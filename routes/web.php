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

Route::get('/login', function () {
    return view('pizza/login');
});

Route::get('/register', function () {
    return view('pizza/register');
});

Route::get('/home', function () {
    return view('pizza/home');
});

Route::get('/detail', function () {
    return view('pizza/detail');
});

Route::get('/cart', function () {
    return view('pizza/cart');
});

Route::get('/history', function () {
    return view('pizza/history');
});

Route::get('/detailt', function () {
    return view('pizza/detailT');
});

Route::get('/detailt', function () {
    return view('pizza/detailT');
});

Route::get('/add', function () {
    return view('pizza/add');
});

Route::get('/edit', function () {
    return view('pizza/edit');
});

Route::get('/user', function () {
    return view('pizza/user');
});

Route::get('/historya', function () {
    return view('pizza/historyA');
});