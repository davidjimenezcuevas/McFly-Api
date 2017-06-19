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

// -------------------------- NotaController -------------------------------------
Route::get('/getall', 'NotaController@getAll');

Route::post('/getallbyuser', 'NotaController@getAllByUser');
Route::post('/createnota', 'NotaController@createNota');
Route::post('/getnotabyid', 'NotaController@getNotaById');


// -------------------------- UserController -------------------------------------
Route::post('/getnotafav', 'UserController@getNotaFav');
Route::post('/fav', 'UserController@fav');

