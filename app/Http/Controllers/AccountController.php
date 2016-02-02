<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Response;
use Validator;
use Hash;

class AccountController extends Controller
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
    public function show($username)
    {
        $user = User::where('username', $username)->first();
        return view('accounts.show', compact('user'));
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

    public function postUpdate(Request $http)
    {
        $user = Auth::user();
        $user->display_name = $http->displayName;
        $user->username = $http->username;
        $user->email = $http->email;
        $user->phone = $http->phone;
        $user->save();

        return redirect('account/manage/' . Auth::user()->username)->withMessage('Account successfully updated.');
    }

    public function postPasswordReset(Request $http)
    {
        $user = Auth::user();
        if( ! Hash::check($http->old_password, $user->password))
        {
            return Response::json(['errorMessages' => array('Old password is not correct.')]);
        }

        $validator = Validator::make($http->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed'
        ]);

        if($validator->fails())
        {
            $messages = $validator->errors();
            return Response::json(['errorMessages' => $messages->all()]);
        }

        $user->password = Hash::make($http->new_password);
        $user->save();

        return Response::json(['message' => 'Successfully changed password.']);
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
