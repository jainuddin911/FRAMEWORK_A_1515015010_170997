<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pengguna','PenggunaController@awal');
Route::get('pengguna/tambah','PenggunaController@tambah');
Route::get('ruangan','RuanganController@awal');
Route::get('ruangan/tambah','RuanganController@tambah');
Route::get('matakuliah','MatakuliahController@awal');
Route::get('matakuliah','MatakuliahController@tambah');


