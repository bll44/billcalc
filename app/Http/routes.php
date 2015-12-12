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

use App\TransactionRecord;

Route::get('date_test', function()
{
	$transactions = TransactionRecord::orderBy('created_at', 'DESC')->get();
	foreach($transactions as $t)
	{
		// echo $t->created_at . '<br />';
		echo date('F d, Y H:i:s', strtotime($t->created_at)) . '<br />';
	}
});

Route::get('/', 'BillController@index');
Route::get('transaction/store', 'BillController@storeTransactionDetails');