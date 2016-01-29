<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\TransactionRecord;
use DateTime;
use App\Resident;
use App\Residence;
use Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$trans_history = TransactionRecord::orderBy('created_at', 'DESC')->get();
    	return view('bill_processing.calculator', ['transaction_history' => $trans_history]);
    }

    public function manage()
    {
    	$resident = Resident::find(Auth::user()->id);
    	$residences = $resident->residences;
    	return view('bill_processing.manage', compact('residences'));
    }

    public function view(Request $http)
    {
    	$residence = Residence::find($http->residence);
    	$bills = $residence->bills;
    	return view('bill_processing.view', compact('bills', 'residence'));
    }

    public function getMonthlyBills(Request $request)
    {
    	$bill = DB::select('SELECT * FROM bills WHERE month_of = ? 
    		AND year_of = ? AND residence_id = ?', 
    		[$request->month_of, $request->year_of, $request->residence])->get();
    	return json_encode($bill);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeTransactionDetails(Request $http)
    {
    	$tr = new TransactionRecord;
    	$tr->createTransactionRecord([
    		'cable_amt' => $http->cable_amt,
    		'gas_amt' => $http->gas_amt,
    		'water_amt' => $http->water_amt,
    		'electric_amt' => $http->electric_amt,
    		'raw_total' => $http->raw_total,
    		'num_people' => $http->num_people,
    	]);
    	return response()->json(['status' => 200]);
    }
}
