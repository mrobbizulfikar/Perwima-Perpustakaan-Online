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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::middleware('level')->group(function (){
	Route::prefix('admin')->name('admin.')->group(function(){
		Route::resource('', 'AdminController');
		Route::resource('category', 'CategoryController');
		Route::resource('book', 'BookController');
		Route::resource('transaction', 'TransactionController');
		Route::resource('history', 'HistoryController');
		Route::resource('news', 'NewsController');
	});
});

Route::prefix('member')->name('member.')->group(function(){
	Route::resource('transaction', 'TransactionController');
});