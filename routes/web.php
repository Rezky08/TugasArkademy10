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

Route::get('/', "ProdukController@index");
Route::get('/detail/{id}', "ProdukController@show");
Route::get('/tambah', 'ProdukController@create');
Route::post('/tambah', 'ProdukController@store');
Route::get('/ubah/{id}', 'ProdukController@edit');
Route::put('/ubah/{id}', 'ProdukController@update');
Route::delete('/hapus/{id}', 'ProdukController@destroy');
