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

/* Non authenticated routes */
Route::get('/', 'FrontController@index')->name('home');

/* Auth routes */
Route::get('/logout','Auth\LoginController@logout'); // adding a get route to the logout - mouse hater...
Auth::routes();

Route::get('/dashboard', 'DashboardController@transfer')->name('transfer');
Route::get('/transactions', 'DashboardController@transactions')->name('transactions');
