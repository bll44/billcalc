<?php

Route::get('testnum', function() {
	for($i = 0; $i <= 110; $i++)
	{
		echo str_pad($i, 3, '0', STR_PAD_LEFT).'<br/>';
	}
});

/* Define a few routes for the home page */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/calc', 'HomeController@index');
Route::get('/home/calc', 'HomeController@index');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('venmo/oauth', 'VenmoController@runOAuth');
Route::get('venmo/logout', 'VenmoController@logout');

Route::group(['middleware' => 'auth'], function() {
	Route::get('bills/manage', 'BillController@index');
	Route::get('bills/residence/{residence_id}/create', 'BillController@create');
	Route::post('bills/store', 'BillController@store');
});

Route::group(['middleware' => 'auth'], function() {
	// Residence Resident routes
	Route::get('residences', 'ResidenceController@index');
	Route::get('residences/new', 'ResidenceController@create');
	Route::post('residences/store', 'ResidenceController@store');
	Route::post('residences/add_resident', 'ResidenceController@postAddResident');
	Route::get('residences/add_resident/search', 'ResidenceController@resident_search');
	Route::get('residences/{id}', 'ResidenceController@show');

	// Residence Bill routes

});

Route::group(['middleware' => 'auth'], function() {
	Route::get('account/manage/{username}', 'AccountController@show');
	Route::post('account/update', 'AccountController@postUpdate');
	Route::post('account/password-reset', 'AccountController@postPasswordReset');
});

// Admin routes
Route::group(['middleware' => 'auth'], function() {
	Route::get('admin', 'AdminController@index');
});