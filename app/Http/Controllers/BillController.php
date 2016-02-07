<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Residence;
use App\Bill;
use App\Resident;
use Auth;
use DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $http)
    {
        // if($http->filter === '')
        $resident = Resident::find(Auth::user()->id);
        $bills = $resident->bills;
        return view('bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $residence = Residence::find($id);
        return view('bills.create', compact('residence'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $http, Bill $bill)
    {
        $this->validate($http, [
            'bill_name' => 'required',
            'resident_id' => 'required',
            'residence_id' => 'required',
            'bill_due_date_month' => 'required',
            'bill_due_date_year' => 'required',
        ]);

        $bill->name = $http->bill_name;
        $bill->resident_id = $http->resident_id;
        $bill->residence_id = $http->residence_id;

        if($http->has('bill_amount'))
        {
            $value = trim($http->bill_amount);
            if($value != '')
            {
                $bill->amount = $value;
            }
        }

        $due_date = date($http->bill_due_date_year . '-' . $http->bill_due_date_month . '-28');
        $bill->due_date = $due_date;
        $bill->description = $http->bill_description;
        $bill->save();
        
        // add an approval as the creator of the bill
        $bill->approve();
        // check if bill can become active
        $bill->checkActiveState();

        return redirect('residences/' . $http->residence_id);
    }

    public function approve($bill_id, Bill $bill)
    {
        $bill = Bill::find($bill_id);
        // mark the bill as approved for the logged in user
        $bill->approve();
        // check if the bill can now become active
        $bill->checkActiveState();
        return redirect('residences/' . $bill->residence->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Bill::find($id)->residence;
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
}
