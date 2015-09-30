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

Route::get('/', function () {
  #return 'nothing';
    return  view('welcome');
});

// Route::get('login', array('as'=>'login','uses'=>'UsersController@login'));
//
// Route::post('login','UsersController@handleLogin');

Route::get('/test', function(){
  return view('product.test');
});


Route::resource('product','ProductController');
//Route::resource('product',['before'=>'auth','uses'=>'ProductController']);
