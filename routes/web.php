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

Route::prefix('todo')->group(function(){
	Route::get('/dashboard', 'TodoController@index')->name('todo.dashboard');
	Route::post('/task','TodoController@addTask')->name('todo.save');
	Route::post('/delete', 'TodoController@destroy')->name('todo.delete');
});

Route::get('/home', 'HomeController@index')->name('home');
