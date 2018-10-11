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
  Route::get('/', array('uses' => 'UserController@dashboard', 'as' => 'dashboard'));
  Route::get('logout', array('uses' => 'UserController@getLogout', 'as' => 'getLogout'));

  //Customer Routes
  Route::get('allCustomers', array('uses' => 'CustomerController@allCustomers', 'as' => 'allCustomers'));
  Route::get('customer/{id}', array('uses' => 'CustomerController@customer', 'as' => 'customer'));

  //Order Routes
  Route::get('allOrders', array('uses' => 'OrderController@allOrders', 'as' => 'allOrders'));
  Route::get('order/{id}', array('uses' => 'OrderController@order', 'as' => 'order'));
  Route::get('sales', array('uses' => 'OrderController@sales', 'as' => 'sales'));
  Route::get('imei/{id}', array('uses' => 'OrderController@imei', 'as' => 'imei'));

  //User Management Routes
  Route::get('allUsers', array('uses' => 'UserController@allUsers', 'as' => 'allUsers'));
  Route::get('addUser', array('uses' => 'UserController@addUser', 'as' => 'addUser'));
  Route::get('editUser/{id}', array('uses' => 'UserController@editUser', 'as' => 'editUser'));

  Route::group(array('before' => 'csrf'), function(){
    //Post Order
    Route::post('postOrder/{id}', array('uses' => 'OrderController@postOrder', 'as' => 'postOrder'));
    Route::post('postImei/{id}', array('uses' => 'OrderController@postImei', 'as' => 'postImei'));
    //Post User
    Route::post('postUser', array('uses' => 'UserController@postUser', 'as' => 'postUser'));
    Route::post('postEditUser/{id}', array('uses' => 'UserController@postEditUser', 'as' => 'postEditUser'));
    });

});

//Guest Routes
Route::group(array('middleware' => 'web'), function(){
   Route::get('register', array('uses' => 'GuestController@getRegister', 'as' => 'register'));
   Route::get('login', array('uses' => 'GuestController@getLogin', 'as' => 'login'));
   Route::get('2Fa', array('uses' => 'GuestController@get2Fa', 'as' => '2Fa'));
    Route::group(array('before' => 'csrf'), function(){
       Route::post('register', array('uses' => 'GuestController@postRegister', 'as' => 'postRegister'));
       Route::post('login', array('uses' => 'GuestController@postLogin', 'as' => 'postLogin'));
       Route::post('2Fa', array('uses' => 'GuestController@post2Fa', 'as' => 'post2Fa'));
    });
});
