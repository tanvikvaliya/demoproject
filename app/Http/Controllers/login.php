<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    function index(Request $req)
    {
      $req->session()->put('data',$req->input());
      return redirect('/');
    }
}
