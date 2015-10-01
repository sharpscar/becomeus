<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Auth\AuthController@getLogin');

// function () {
//   #return 'nothing';
//     return  view('auth.login');
// });

// Route::get('login', array('as'=>'login','uses'=>'UsersController@login'));
//
// Route::post('login','UsersController@handleLogin');

Route::get('/test', function(){
  return view('product.test');
});


Route::resource('product','ProductController');
//Route::resource('product',['before'=>'auth','uses'=>'ProductController']);


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);
