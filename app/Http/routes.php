<?php

/* Define a few routes for the home page */
Route::get('/', 'BillController@index');
Route::get('/home', 'BillController@index');
Route::get('/calc', 'BillController@index');
Route::get('/home/calc', 'BillController@index');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('venmo/oauth', 'VenmoController@runOAuth');
Route::get('venmo/logout', 'VenmoController@logout');

Route::group(['middleware' => 'auth'], function() {
	Route::get('bills/manage', 'BillController@manage');
	Route::get('bills/view', 'BillController@view');
	Route::get('bills/month', 'BillController@getMonthlyBills');
	Route::get('transaction/store', 'BillController@storeTransactionDetails');
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('residences', 'ResidenceController@index');
	Route::get('residences/new', 'ResidenceController@create');
	Route::post('residences/store', 'ResidenceController@store');
	Route::post('residences/add_resident', 'ResidenceController@postAddResident');
	Route::get('residences/add_resident/search', 'ResidenceController@resident_search');
	Route::get('residences/{id}', 'ResidenceController@show');
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('account/manage/{username}', 'AccountController@show');
});

Route::post('admin/add_user', 'AdminController@addUser');


// Route::group(['middleware' => 'venmo_sandbox'], function() {
// 	Route::get('venmo/sandbox/payment', 'SandboxController@makePayment');
// });