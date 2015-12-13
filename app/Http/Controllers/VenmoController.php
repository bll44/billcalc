<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class VenmoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function runOAuth(Request $request, User $user)
    {
    	$venmo_code = $request->code;

    	$url = 'https://api.venmo.com/v1/oauth/access_token';
    	$ch = curl_init();
    	$curl_config = array(
    		CURLOPT_URL             => $url,
    		CURLOPT_POST            => true,
    		CURLOPT_RETURNTRANSFER  => true,
    		CURLOPT_POSTFIELDS      => array(
	    			'client_id'     => env('VENMO_APPID'),
	    			'code'          => $venmo_code,
	    			'client_secret' => env('VENMO_APP_SECRET'),
    			)
    		);
    	curl_setopt_array($ch, $curl_config);
    	$result = curl_exec($ch);
    	curl_close($ch);

    	$data = json_decode($result, true);

    	$user->username = $data['user']['username'];
    	$user->name = $data['user']['display_name'];
    	$user->save();
    	return $user;
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
 }
