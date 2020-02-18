<?php
use App\Message;
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
  'as' => 'home'
]);
Route::get('/home',[
  'uses' => 'HomeController@index',
  'as' => 'home'
]);

/** Route For messenger Controllers **/
Route::get('/messenger', 'MessengerController@index')->name('messages.index');

Route::get('/messenger/count',function(){
    return Message::where('to','=',Auth::user()->id)
            ->where('read',0)->count();
});

Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');


//  agars Routes for web...
Route::get('agars',[
    'uses' => 'agarController@list',
    'as' => 'agars.agarsList',
    'middleware' => ['auth']
]);
// for filter component
Route::get('agars/json',[
    'uses' => 'agarController@agars_as_json',
    'middleware' => ['auth']
]);
// get agars for spacific user
Route::get('my-agars',[
    'uses' => 'agarController@myAgars',
    'as' => 'agars.myAgars',
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
# search agar by name
Route::get('agars/search/{query}',[
    'uses' => 'agarController@search_by_name',
    'as' => 'agars.search',
    'middleware' => ['auth']
]);
# filter agars
Route::post('agars/filter',[
    'uses' => 'agarController@agar_filter',
    'as' => 'agars.filter',
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
# reservation sended to user
Route::get('reservation',[
    'uses' => 'reservationController@index',
    'as' => 'reservation.index',
    'middleware' => ['auth']
]);
#reservation sended by user
Route::get('reservation/sent',[
    'uses' => 'reservationController@sent',
    'as' => 'reservation.sent',
    'middleware' => ['auth']
]);

# to upload bill image for reservation payment
Route::post('reservation/sent',[
    'uses' => 'reservationController@postBill',
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
Route::get('admin-dashboard',[
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

// dashboard - payment
Route::get('dashboard/payment',[
    'uses' => 'dashboardController@getPayment',
    'as' => 'dashboard.payment',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/payment',[
    'uses' => 'dashboardController@postPayment',
    'middleware' => ['isAdmin']
]);

// dashboard - settings
Route::get('dashboard/settings',[
    'uses' => 'dashboardController@getSettings',
    'as' => 'dashboard.settings',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/settings',[
    'uses' => 'dashboardController@postSettings',
    'middleware' => ['isAdmin']
]);

// b_extra manage
Route::get('dashboard/b_extra',[
    'uses' => 'dashboardController@getB_extra',
    'as' => 'dashboard.b_extra',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/b_extra',[
    'uses' => 'dashboardController@postB_extra',
    'middleware' => ['isAdmin']
]);
Route::get('dashboard/b_extra/add',[
    'uses' => 'dashboardController@add_B_extra',
    'as' => 'dashboard.add_b_extra',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/b_extra/add',[
    'uses' => 'dashboardController@postB_extra',
    'middleware' => ['isAdmin']
]);

// a_extra manage
Route::get('dashboard/a_extra',[
    'uses' => 'dashboardController@getA_extra',
    'as' => 'dashboard.a_extra',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/a_extra',[
    'uses' => 'dashboardController@postA_extra',
    'middleware' => ['isAdmin']
]);

Route::get('dashboard/a_extra/add',[
    'uses' => 'dashboardController@add_A_extra',
    'as' => 'dashboard.add_a_extra',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/a_extra/add',[
    'uses' => 'dashboardController@postA_extra',
    'middleware' => ['isAdmin']
]);

// sf_extra manage
Route::get('dashboard/sf_extra',[
    'uses' => 'dashboardController@getSf_extra',
    'as' => 'dashboard.sf_extra',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/sf_extra',[
    'uses' => 'dashboardController@postSf_extra',
    'middleware' => ['isAdmin']
]);

Route::get('dashboard/sf_extra/add',[
    'uses' => 'dashboardController@Add_Sf_extra',
    'as' => 'dashboard.add_sf_extra',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/sf_extra/add',[
    'uses' => 'dashboardController@postSf_extra',
    'middleware' => ['isAdmin']
]);

// condition manage
Route::get('dashboard/agar_condition',[
    'uses' => 'dashboardController@getCond',
    'as' => 'dashboard.agar_condition',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/agar_condition',[
    'uses' => 'dashboardController@postCond',
    'middleware' => ['isAdmin']
]);

Route::get('dashboard/agar_condition/add',[
    'uses' => 'dashboardController@AddCond',
    'as' => 'dashboard.add_agar_condition',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/agar_condition/add',[
    'uses' => 'dashboardController@postCond',
    'middleware' => ['isAdmin']
]);

// agar type manage
Route::get('dashboard/agar_type',[
    'uses' => 'dashboardController@getAgar_type',
    'as' => 'dashboard.agar_type',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/agar_type',[
    'uses' => 'dashboardController@postAgar_type',
    'middleware' => ['isAdmin']
]);

Route::get('dashboard/agar_type/add',[
    'uses' => 'dashboardController@AddAgar_type',
    'as' => 'dashboard.add_agar_type',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/agar_type/add',[
    'uses' => 'dashboardController@postAgar_type',
    'middleware' => ['isAdmin']
]);

// agar floor
Route::get('dashboard/agar_floor',[
    'uses' => 'dashboardController@getAgar_floor',
    'as' => 'dashboard.agar_floor',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/agar_floor',[
    'uses' => 'dashboardController@postAgar_floor',
    'middleware' => ['isAdmin']
]);

Route::get('dashboard/agar_floor/add',[
    'uses' => 'dashboardController@AddAgar_floor',
    'as' => 'dashboard.add_agar_floor',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/agar_floor/add',[
    'uses' => 'dashboardController@postAgar_floor',
    'middleware' => ['isAdmin']
]);

// state info
Route::get('dashboard/states',[
    'uses' => 'dashboardController@getStates',
    'as' => 'dashboard.states',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/states',[
    'uses' => 'dashboardController@postStates',
    'middleware' => ['isAdmin']
]);

Route::get('dashboard/states/add',[
    'uses' => 'dashboardController@AddStates',
    'as' => 'dashboard.add_states',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/states/add',[
    'uses' => 'dashboardController@postStates',
    'middleware' => ['isAdmin']
]);

// cities info
Route::get('dashboard/cities',[
    'uses' => 'dashboardController@getCities',
    'as' => 'dashboard.cities',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/cities',[
    'uses' => 'dashboardController@postCities',
    'middleware' => ['isAdmin']
]);

Route::get('dashboard/cities/add',[
    'uses' => 'dashboardController@AddCities',
    'as' => 'dashboard.add_cities',
    'middleware' => ['isAdmin']
]);
Route::post('dashboard/cities/add',[
    'uses' => 'dashboardController@postCities',
    'middleware' => ['isAdmin']
]);
