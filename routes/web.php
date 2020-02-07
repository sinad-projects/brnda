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
//Auth::routes();

//Login Routes...
Route::get('lets',[
    'uses' => '\App\Http\Controllers\Auth\LoginController@showLoginForm',
    'as' => 'login'
]);
Route::post('lets',[
    'uses' => '\App\Http\Controllers\Auth\LoginController@login',
]);

Route::post('logout',[
    'uses' => '\App\Http\Controllers\Auth\LoginController@logout',
    'as' => 'logout'
]);

// Registration Routes...
Route::get('register',[
    'uses' => '\App\Http\Controllers\Auth\RegisterController@showRegistrationForm',
    'as' => 'register',
]);
Route::post('register',[
    'uses' => '\App\Http\Controllers\Auth\RegisterController@register',
]);

// home page routes
Route::get('/',[
  'uses' => 'HomeController@index',
  'as' => 'home',
  'middleware' => ['auth']
]);
Route::get('/home',[
  'uses' => 'HomeController@index',
  'as' => 'home',
  'middleware' => ['auth']
]);
Route::post('home/agar/delete',[
    'uses' => 'HomeController@destroy',
    'as' => 'agars.delete',
    'middleware' => ['auth']
]);
Route::post('home',[
    'uses' => 'HomeController@store',
    'as' => 'agars.store',
    'middleware' => ['auth']
]);

//  agars Routes for web...
Route::get('agars',[
    'uses' => 'agarController@list',
    'as' => 'agars.list',
]);
// single agar
Route::get('agars/{agar_id}',[
    'uses' => 'agarController@single',
    'as' => 'agars.single',
]);
Route::post('agars/{agar_id}',[
    'uses' => 'agarController@postSingle',
]);

// reservation Routes...
Route::get('reservation',[
    'uses' => 'reservationController@index',
    'as' => 'reservation.index',
    'middleware' => ['auth']
]);
Route::post('reservation',[
    'uses' => 'reservationController@index',
    'middleware' => ['auth']
]);
