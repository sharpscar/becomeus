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
    //로그인 정보가 있는경우
    if(Auth::check()){
      return Redirect::to('product');
    }else{
      //없는경우
        return  view('auth.login');
    }

});

// Route::get('login', array('as'=>'login','uses'=>'UsersController@login'));
//
// Route::post('login','UsersController@handleLogin');




Route::resource('product','ProductController');
//Route::resource('product',['before'=>'auth','uses'=>'ProductController']);

#Route::post('product/{id}/photos', ['as'=>'stor_photo_path','uses'=>'ProductController@addPhoto']);

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

Route::get('importPage', 'ProductController@importPage');

Route::post('importData','ProductController@importData');
Route::get('exd','ProductController@exportData');


Route::get('orders/autocomplete', 'ProductController@autocomplete');
Route::get('orders/{id}/autocomplete', 'ProductController@autocomplete');


App::bind('Acme\Repos\OrderRepoInterface', 'Acme\Repos\DbOrderRepo');

Route::resource('orders','OrderController');
Route::get('orders', ['as'=>'orders','uses'=> 'OrderController@index']);
// Route::get('orders/create', 'OrderController@create');
// Route::get('orders/{id}', 'OrderController@show');
// Route::post('orders', 'OrderController@store');


// Route::get('productsImages',  'ProductController@service_image');


// Event::listen('illuminate.query', function($query)
// {
//     var_dump($query);
// });
