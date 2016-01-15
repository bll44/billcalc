<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SandboxController extends Controller
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

    public function makePayment()
    {
        //
        // A very simple PHP example that sends a HTTP POST to a remote site
        //

        $url = 'https://sandbox-api.venmo.com/v1/payments';

        $data = array(
            'access_token' => '0c1bf21a6a95733ddaddde83fbf755aecbd591bf3a4abccfc3f2dd94ac71c684',
            'user_id' => '145434160922624933',
            'email' => 'venmo@venmo.com',
            'phone' => '15555555555',
            'note' => 'A message to accompany the payment.',
            'amount' => '0.10',
        );
        $query_string = '';
        foreach($data as $key => $val)
        {
            $query_string .= $key . '=' . rawurlencode($val) . '&';
        }
        $query_string = htmlentities(rtrim($query_string, '&'));
        // return $query_string
;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);

        $result = curl_exec($ch);
        if($result == false)
        {
            die('Curl failed: ' . curl_error($ch));
        }


        curl_close($ch);
        $data = json_decode($result, true);
        return $data;

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
