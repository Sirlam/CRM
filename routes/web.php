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
//User ROutes
Route::group(['middleware' => ['auth']], function(){
  Route::get('/', array('uses' => 'UserController@index', 'as' => 'index'));
});

//Guest Routes
Route::group(array('middleware' => 'web'), function(){
   Route::get('register', array('uses' => 'GuestController@getRegister', 'as' => 'register'));
   Route::get('login', array('uses' => 'GuestController@getLogin', 'as' => 'login'));
    Route::group(array('before' => 'csrf'), function(){
       //Route::post('register', array('uses' => 'GuestController@postRegister', 'as' => 'postRegister'));
       //Route::post('login', array('uses' => 'GuestController@postLogin', 'as' => 'postLogin'));
    });
});
