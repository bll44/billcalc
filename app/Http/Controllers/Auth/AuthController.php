<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use View;
use Illuminate\Http\Request;
use App\Resident;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;
    protected $redirectPath = '/home/calc';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:255|unique:users',
            'phone' => 'max:10',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'display_name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getRegister()
    {
        return View::make('Auth.register');
    }

    public function postRegister(Resident $resident, Request $http)
    {
        if($this->validator($resident = $http->all())->passes())
        {
            $this->create($resident);
            return redirect('/home/calc');
        }
        else
        {
            return redirect('auth/register');
        }
    }

    public function getLogin()
    {
        return view('Auth.login');
    }

    public function postLogin(Request $http, User $user)
    {
        $username = $http->username;
        $password = $http->password;
        if(Auth::attempt(['username' => $username, 'password' => $password]))
        {
            return redirect()->intended('/home/calc');
        }
        
        return redirect('auth/login')->with('loginError', 'Login failed.');
    }

    public function getLogout()
    {
        session()->flush();
        Auth::logout();
        session()->regenerate();
        return redirect('/');
    }
}
