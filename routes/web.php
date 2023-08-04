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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// kategori
Route::resource('/kategori', 'kategoriController');

// resep
Route::get('/resep', 'ResepController@index');
Route::get('resep/create', 'ResepController@create');
Route::post('resep', 'ResepController@store');
Route::get('resep/{id}/edit', 'ResepController@edit');
Route::put('resep/{id}', 'ResepController@update');
Route::delete('resep/{id}', 'ResepController@destroy');

// gambar resep
// Route::get('products/{productID}/images','ProductController@images');
Route::get('resep/{id}/gambar-makanan','ResepController@tambahGambar');
Route::post('resep/gambar/{id}','ResepController@storeGambar');
Route::delete('resep/gambar/{id}', 'ResepController@removeGambar');
// Route::get('resep/{id}/gambar-makanan', 'ResepController@tambahGambar');
// Route::post('resep/gambar/{id}', 'ResepController@storeGambar');
// Route::get('resep/gambar/{id}/edit', 'ResepController@editGambar');
// Route::put('resep/gambar/{id}', 'ResepController@updateGambar');
// Route::delete('resep/gambar/{id}', 'ResepController@removeGambar');