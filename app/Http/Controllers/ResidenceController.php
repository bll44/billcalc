<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Residence;
use App\Resident;
use DB;
use Auth;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residences = Resident::find(Auth::user()->id)->residences;
        return View::make('residences.index', ['residences' => $residences]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('residences.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $http, Residence $residence)
    {
        // save newly created residence data
        $residence->nickname = $http->nickname;
        $residence->address1 = $http->address1;
        $residence->address2 = $http->address2;
        $residence->city = $http->city;
        $residence->state = $http->state;
        $residence->zipcode = $http->zipcode;
        $residence->num_residents = $http->num_residents;
        $residence->monthly_rent = $http->rent;

        // save new residence to the database
        $residence->save();
        // insert relationship between authenticated user
        // and the newly created residence
        $residence->residents()->attach(Auth::user()->id);

        return redirect('residences');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $residence = Residence::find($id);
        return View::make('residences.show', compact('residence'));
    }

    public function postAddResident(Request $http)
    {
        $resident = Resident::find($http->resident_id);
        $residence = Residence::find($http->residence_id);

        $query = 'select * from calcdb.residence_resident where resident_id = ? and residence_id = ?';
        $statement = DB::select($query, array($resident->id, $residence->id));

        // Create relationship between residence and newly added resident
        $residence->residents()->attach($resident->id);
        return response()->json(['status' => 200, 'query' => $query]);
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

    public function resident_search(Request $http)
    {
        $ss = $http->ss;
        $values = [$ss, $ss, $ss];
        $result = DB::select("SELECT * FROM calcdb.users WHERE username LIKE concat('%', ?, '%') OR 
                                    email LIKE concat('%', ?, '%') OR display_name LIKE concat('%', ?, '%')
                                    LIMIT 12", $values);
        return json_encode($result);
    }
}
