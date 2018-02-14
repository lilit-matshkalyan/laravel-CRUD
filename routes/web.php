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
Route::delete('delete/{id}', 'UserController@delete');


Route::group(['prefix' => 'posts'], function() {
    Route::get('/', 'PostController@index');
    Route::match(['get', 'post'], 'create', 'PostController@create');
    Route::match(['get', 'put'], 'update/{id}', 'PostController@update');
    Route::get('show/{id}', 'PostController@show');
    Route::delete('delete/{id}', 'PostController@destroy');
});

