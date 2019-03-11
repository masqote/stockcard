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
// Master Code
Route::get('/master_code', 'StockController@master_code');
Route::post('/master_code', 'StockController@master_code_store');
// Group Master Code
Route::get('/group_master_code', 'StockController@group_master_code');
Route::post('/group_master_code', 'StockController@group_master_code_store');
// Purchasing
Route::get('/purchasing', 'StockController@purchasing');
Route::post('/purchasing', 'StockController@purchasing_store');
// warehouse
Route::get('/warehouse', 'StockController@warehouse');
Route::get('/warehouse/{po_number}', 'StockController@warehouse_view');
Route::post('/warehouse/{po_number}', 'StockController@warehouse_store');