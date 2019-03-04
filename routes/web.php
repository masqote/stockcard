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

// Route::get('/tes', function () {
//     return view('welcome');
// });

Route::get('/', 'StockController@home');

Route::get('/master_code', 'StockController@master_code');
Route::post('/master_code', 'StockController@master_code_store');
