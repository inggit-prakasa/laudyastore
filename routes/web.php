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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard','AdminController@dashboard');
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
