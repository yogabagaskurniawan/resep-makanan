<?php

use Illuminate\Support\Facades\Auth;
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

// Resep User
Route::get('/', 'UserResepController@index');
Route::get('/resep-makanan/{slug}', 'UserResepController@showResep');
Route::get('/resep-makanan-detail/{slug}', 'UserResepController@detailResep');

// artikel User
Route::get('/artikel-resep-makanan', 'UserResepController@showArtikel');
Route::get('/artikel-makanan-detail/{slug}', 'UserResepController@detailArtikel');

// contact
Route::get('/contact', 'UserResepController@contact');

// search
Route::get('/search', 'UserResepController@search');

Auth::routes();

//  ===============================    ADMIN ======================================

// kategori
Route::resource('/kategori', 'kategoriController')->middleware('auth');

// resep
Route::get('/resep', 'ResepController@index')->middleware('auth');
Route::get('/resep/create', 'ResepController@create')->middleware('auth');
Route::post('resep', 'ResepController@store')->middleware('auth');
Route::get('resep/{id}/edit', 'ResepController@edit')->middleware('auth');
Route::put('resep/{id}', 'ResepController@update')->middleware('auth');
Route::delete('resep/{id}', 'ResepController@destroy')->middleware('auth');

// gambar resep
Route::get('resep/{id}/gambar-makanan','ResepController@tambahGambar')->middleware('auth');
Route::post('resep/gambar/{id}','ResepController@storeGambar')->middleware('auth');
Route::delete('resep/gambar/{id}', 'ResepController@removeGambar')->middleware('auth');

// bahan makanan
Route::get('resep/{id}/bahan-makanan', 'ResepController@tambahbahan')->middleware('auth');
Route::post('resep/bahan/{id}', 'ResepController@storeBahan')->middleware('auth');
Route::get('resep/bahan/{id}/edit', 'ResepController@editBahan')->middleware('auth');
Route::put('resep/bahan/{id}', 'ResepController@updateBahan')->middleware('auth');
Route::delete('resep/bahan/{id}', 'ResepController@removeBahan')->middleware('auth');

// cara membuat makanan
Route::get('resep/{id}/cara-membuat', 'ResepController@tambahCaraMembuat')->middleware('auth');
Route::post('resep/cara-membuat/{id}', 'ResepController@storeCaraMembuat')->middleware('auth');
Route::get('resep/cara-membuat/{id}/edit', 'ResepController@editCaraMembuat')->middleware('auth');
Route::put('resep/cara-membuat/{id}', 'ResepController@updateCaraMembuat')->middleware('auth');
Route::delete('resep/cara-membuat/{id}', 'ResepController@removeCaraMembuat')->middleware('auth');

// artikel
Route::resource('/artikel', 'ArtikelController')->middleware('auth');