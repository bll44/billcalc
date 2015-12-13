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

Route::get('/', 'BillController@index');
Route::get('transaction/store', 'BillController@storeTransactionDetails');

Route::get('auth/login', 'Auth\AuthController@login');
Route::get('auth/register', 'Auth\AuthController@register');

Route::get('venmo/oauth', 'VenmoController@runOAuth');