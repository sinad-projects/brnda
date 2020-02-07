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
# ===== get agars for spacific user === #
Route::get('/agar/list/{user_id}','AgarController@get_agar_with_user_id');
#====== List single agar ======#
Route::get('/agar/{id}','AgarController@show');
#====== List Last added agar ======#
Route::get('/agar/lastAdded','AgarController@lastAdded');
#===== delete agar =============#
Route::delete('/agar/delete/{agar_id}','AgarController@destroy');

// ===========================================================//

# ========== list reservation for user ==============#
Route::get('/reserv/list/{user_id}', 'reservationController@get_reserv_with_user_id');
# ========== list new reservation for user ==============#
Route::get('/reserv/new/{user_id}', 'reservationController@get_new_reserv_with_user_id');
# ========== list accepted reservation for user ==============#
Route::get('/reserv/accepted/{user_id}', 'reservationController@get_accepted_reserv_with_user_id');
# ========== list confirmable reservation for user ==============#
Route::get('/reserv/confirmable/{user_id}', 'reservationController@get_confirmable_reserv_with_user_id');
# ========== to add new reservation ==============#
Route::get('/reserv/add', 'reservationController@store');
