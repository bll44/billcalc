<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\User;
use DateTime;
use DateInterval;

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

        // Venmo api url
    	$url = 'https://api.venmo.com/v1/oauth/access_token';

        // send post request for user information
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

        // user information returned from Venmo api
    	$data = json_decode($result, true);
        $userdat =& $data['user'];
        $user->username = $userdat['username'];
        // if venmo username does not exist in database - save the user because they are new
        if(User::where('username', $user->username)->get()->count() < 1)
        {
            
            // save all returned user-venmo data to a user object fo
            // reference $data['user'] for sake of saving keystrokes
            $user->email = $userdat['email'];
            $user->phone = (int)$userdat['phone'];
            $user->display_name = $userdat['display_name'];
            $user->balance = $data['balance'];
            $user->v_id = $userdat['id'];
            $user->access_token = $data['access_token'];
            $user->refresh_token = $data['refresh_token'];

            // Venmo access_tokens expire after ~60 days.
            // OAuth returns the expiration date in the form of '# of seconds in the future'
            // Convert seconds into days to set the expiration date of the token
            // Then convert the days in the future into a date in the future
            $exp_seconds = $data['expires_in'];
            $exp_days = $exp_seconds / 60 / 60 / 24;
            $dt = new DateTime();
            $dt->add(new DateInterval('P60D'));
            $user->token_expire_date = $dt->format('Y-m-d H:i:s');

            // save user to update database with any recent changes to
            // his/her Venmo account since last login
            $user->save();
        }
        else
        {
            $user = User::where('username', $user->username)->first();
            
            // save all returned user-venmo data to a user object fo
            // reference $data['user'] for sake of saving keystrokes
            $user->email = $userdat['email'];
            $user->phone = (int)$userdat['phone'];
            $user->display_name = $userdat['display_name'];
            $user->balance = $data['balance'];
            $user->v_id = $userdat['id'];
            $user->access_token = $data['access_token'];
            $user->refresh_token = $data['refresh_token'];

            // Venmo access_tokens expire after ~60 days.
            // OAuth returns the expiration date in the form of '# of seconds in the future'
            // Convert seconds into days to set the expiration date of the token
            // Then convert the days in the future into a date in the future
            $exp_seconds = $data['expires_in'];
            $exp_days = $exp_seconds / 60 / 60 / 24;
            $dt = new DateTime();
            $dt->add(new DateInterval('P60D'));
            $user->token_expire_date = $dt->format('Y-m-d H:i:s');
            
            // save user to update database with any recent changes to
            // his/her Venmo account since last login
            $user->save();
        }

        // add user to session for access to user data
        // during application use
        $request->session()->put('auth_user', $user);
        $request->session()->put('is_logged_in', true);
        
    	return redirect('/');
    }

    public function logout()
    {
        session()->flush();
        session()->regenerate();
        return redirect('/');
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
