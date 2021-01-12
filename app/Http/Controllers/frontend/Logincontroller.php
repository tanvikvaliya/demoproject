<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Logincontroller extends Controller
{
    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function userlogin()
    {
        return view('pages.frontend.login');
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
    
        $request->session()->invalidate();
    
        return redirect('/user-login');
    }
}
