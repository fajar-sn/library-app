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
    Route::get('/', 'AdminController@showDashboard')->name('admin.home')->middleware('is_admin');

    // Route::resource('catalog', 'AdminController');

    Route::get('/catalog', 'AdminController@index')->name('admin.catalog')->middleware('is_admin');
    Route::get('/catalog/create', 'AdminController@create')->name('admin.create')->middleware('is_admin');
    Route::get('/catalog/{book}', 'AdminController@show')->name('admin.show')->middleware('is_admin');
    Route::get('/catalog/{book}/edit', 'AdminController@edit')->name('admin.edit')->middleware('is_admin');
    Route::post('/catalog', 'AdminController@store')->name('admin.store')->middleware('is_admin');
    Route::delete('/catalog/{book}', 'AdminController@destroy')->name('admin.destroy')->middleware('is_admin');
    Route::put('/catalog/{book}', 'AdminController@update')->name('admin.update')->middleware('is_admin');

    Route::get('/transaction', 'AdminController@showTransaction')->name('admin.transaction')->middleware('is_admin');
    Route::get('/member', 'AdminController@showMember')->name('admin.member')->middleware('is_admin');
});