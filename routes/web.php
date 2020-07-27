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
Route::get('/', 'Net1Controller@index');
Route::get('/', 'Net2Controller@index');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('net/create', 'Admin\NetController@add');
    Route::post('net/create', 'Admin\NetController@create');
    Route::get('net/edit', 'Admin\NetController@edit');
    Route::post('net/edit', 'Admin\NetController@update');
    Route::get('net/delete', 'Admin\NetController@delete');
    Route::get('net', 'Admin\NetController@index');
    Route::get('net/detail', 'Admin\NetController@detail')->name('symptom_detail');
    
    Route::get('net1/create', 'Admin\Net1Controller@add');
    Route::post('net1/create', 'Admin\Net1Controller@create');
    Route::get('net1/edit', 'Admin\Net1Controller@edit');
    Route::post('net1/edit', 'Admin\Net1Controller@update');
    Route::get('net1/delete', 'Admin\Net1Controller@delete');
    Route::get('net1', 'Admin\Net1Controller@index');
    
    Route::get('net2/create', 'Admin\Net2Controller@add');
    Route::post('net2/create', 'Admin\Net2Controller@create');
    Route::get('net2/edit', 'Admin\Net2Controller@edit');
    Route::post('net2/edit', 'Admin\Net2Controller@update');
    Route::get('net2/delete', 'Admin\Net2Controller@delete');
    Route::get('net2', 'Admin\Net2Controller@index');
});
Auth::routes();
