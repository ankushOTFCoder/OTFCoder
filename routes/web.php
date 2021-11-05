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

Route::get('/user/verify/{token}', 'Auth\LoginController@verifyUser')->name('user.verify');

Route::get('/users', 'UserController@index')->name('users.admin');
Route::get('/user/edit', 'UserController@edit')->name('user.edit');
Route::put('/user/update', 'UserController@update')->name('user.update');

Route::group(['prefix'=> 'api'],function(){
    Route::post('login','API/AuthController@login');
    Route::post('register','API/AuthController@register');

    Route::group(['middleware'=> 'auth:api'], function(){
        Route::resource('user', 'API/UserController');
    });
});