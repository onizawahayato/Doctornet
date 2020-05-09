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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'NetController@index');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('net/create', 'Admin\NetController@add');
    Route::post('net/create', 'Admin\NetController@create'); 
    Route::get('net/edit', 'Admin\NetController@edit');
    Route::post('net/edit', 'Admin\NetController@update');
    Route::get('net/delete', 'Admin\NetController@delete');
    Route::get('net', 'Admin\NetController@index');
});