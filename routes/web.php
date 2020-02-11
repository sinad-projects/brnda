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

//  agars Routes for web...
Route::get('agars',[
    'uses' => 'agarController@list',
    'as' => 'agars.list',
    'middleware' => ['auth']
]);
Route::post('agars/add',[
    'uses' => 'agarController@add',
    'as' => 'agars.add',
    'middleware' => ['auth']
]);
Route::post('agars/edit',[
    'uses' => 'agarController@edit',
    'as' => 'agars.edit',
    'middleware' => ['auth']
]);
Route::post('agars/delete',[
    'uses' => 'agarController@delete',
    'as' => 'agars.delete',
    'middleware' => ['auth']
]);
// single agar
Route::get('agars/{agar_id}',[
    'uses' => 'agarController@single',
    'as' => 'agars.single',
]);
Route::post('agars/{agar_id}',[
    'uses' => 'agarController@postSingle',
]);
// agar control panel
Route::get('agar/dashboard/{agar_id}',[
    'uses' => 'agarController@getDashboard',
    'as' => 'agar.dashboard',
]);
Route::post('agar/dashboard/{agar_id}',[
    'uses' => 'agarController@postDashboard',
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
Route::post('reservation/add',[
    'uses' => 'reservationController@add_Reservation',
    'as' => 'reservation.add',
    'middleware' => ['auth']
]);

// dropzone backend implementation
Route::post('dropzone/store', 'DropzoneController@dropzoneStore')->name('dropzone.store');



# ======================= admin panel ==============#
Route::get('dashboard_',[
    'uses' => 'dashboardController@index',
    'as' => 'dashboard.index',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard',[
    'uses' => 'dashboardController@index',
    'middleware' => ['isAdmin']
]);

// dashboard - users
Route::get('dashboard/users',[
    'uses' => 'dashboardController@getUsers',
    'as' => 'dashboard.users',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/users',[
    'uses' => 'dashboardController@postUsers',
    'middleware' => ['isAdmin']
]);

// dashboard - agars
Route::get('dashboard/agars',[
    'uses' => 'dashboardController@getAgars',
    'as' => 'dashboard.agars',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/agars',[
    'uses' => 'dashboardController@postAgars',
    'middleware' => ['isAdmin']
]);

// dashboard - reservations
Route::get('dashboard/reservations',[
    'uses' => 'dashboardController@getReservations',
    'as' => 'dashboard.reservations',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/reservations',[
    'uses' => 'dashboardController@postReservations',
    'middleware' => ['isAdmin']
]);
