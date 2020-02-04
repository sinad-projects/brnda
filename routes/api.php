<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('test', 'AuthController@test');
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
#====== phone verifiction ======#
Route::get('/user/verifi/{phone}','AuthController@verifiction');
#====== Update user info  ======#
Route::put('/user/update/{id}','ProfileController@update');
// ==============================================//

#====== List All agar's ======#
Route::get('/agar/list/with_paginate', 'AgarController@get_agar_with_paginate');
Route::get('/agar/list/without_paginate', 'AgarController@get_agar_without_paginate');
#====== List single agar ======#
Route::get('/agar/{id}','AgarController@show');
#====== List Last added agar ======#
Route::get('/agar/lastAdded','AgarController@lastAdded');
