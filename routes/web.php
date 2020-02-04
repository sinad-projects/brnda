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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

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
