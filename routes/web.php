<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index')->name('user.home');
    Route::get('/catalog', 'UserController@showCatalog')->name('user.catalog');
    Route::get('/transaction', 'UserController@showTransaction')->name('user.transaction');
});

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home')->middleware('is_admin');
});