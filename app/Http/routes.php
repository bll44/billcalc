<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.v
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'BillController@index');
Route::get('auth/login', 'Auth\AuthController@login');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('venmo/oauth', 'VenmoController@runOAuth');
Route::get('venmo/logout', 'VenmoController@logout');

Route::group(['middleware' => 'venmo_auth'], function() {
	Route::get('bills/manage', 'BillController@manage');
	Route::get('bills/view', 'BillController@view');
	Route::get('bills/month', 'BillController@getMonthlyBills');
	Route::get('transaction/store', 'BillController@storeTransactionDetails');
});

Route::group(['middleware' => 'venmo_auth'], function() {
	Route::get('residences', 'ResidenceController@index');
	Route::get('residences/new', 'ResidenceController@create');
	Route::post('residences/store', 'ResidenceController@store');
	Route::post('residences/add_resident', 'ResidenceController@postAddResident');
	Route::get('residences/add_resident/search', 'ResidenceController@resident_search');
	Route::get('residences/{id}', 'ResidenceController@show');
});


// Route::group(['middleware' => 'venmo_sandbox'], function() {
// 	Route::get('venmo/sandbox/payment', 'SandboxController@makePayment');
// });