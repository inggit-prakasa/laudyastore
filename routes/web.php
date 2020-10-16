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
    return view('login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'ProductController@dashboard');
Route::get('/product','ProductController@index');
Route::get('/product/add','ProductController@add');
Route::post('/product/create','ProductController@create');
Route::get('/product/{id}/delete','ProductController@delete');
Route::get('/product/{id}/edit','ProductController@edit');
Route::post('/product/{id}/update','ProductController@update');
Route::get('/transaction','TransactionController@index');
Route::post('/transaction/addproduct/{id}','TransactionController@addProduct');
Route::post('/transaction/removeproduct/{id}','TransactionController@removeProductCart');
Route::post('/transaction/pay','TransactionController@bayar');
Route::post('/transaction/increasecart/{id}', 'TransactionController@increasecart');
Route::post('/transaction/decreasecart/{id}', 'TransactionController@decreasecart');
Route::get('/transaction/history','TransactionController@history');
Route::post('/transaction/clear','TransactionController@clear');
Route::get('/product/color','ColourController@index');
Route::get('/product/color/add','ColourController@add');
Route::post('/product/color/create','ColourController@create');
Route::get('/product/color/{id}/edit','ColourController@edit');
Route::get('/product/color/{id}/delete','ColourController@delete');
Route::post('/product/color/{id}/update','ColourController@update');
Route::get('/product/download','ProductController@download')->name('product.download');
Route::post('/product/import','ProductController@import')->name('product.import');
Route::prefix('product')->group(function () {
    Route::resource('categories','CategoryController');
    Route::resource('size','SizeController');
});


