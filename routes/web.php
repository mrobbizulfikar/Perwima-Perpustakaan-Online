<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('book')->name('book.')->group(function(){
	Route::get('{isbn}/detail', 'BookController@detail')->name('detail');
	Route::get('search', 'BookController@search')->name('search');
});