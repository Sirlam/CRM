<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //Get the home page
    public function index(){
      return view('user.index');
    }

    //Logout User
    public function getLogout(){
        Auth::logout();
        Session::flush();
        return Redirect::route('index');
    }
}
