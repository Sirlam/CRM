<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Location;
use App\Role;
use App\User;

class UserController extends Controller
{
    //Get the home page
    public function dashboard(){
      $locations = Location::all();
      $roles = Role::all();
      return view('user.dashboard')->with('locations', $locations)->with('roles', $roles);
    }

    //Logout User
    public function getLogout(){
        Auth::logout();
        Session::flush();
        return Redirect::route('dashboard');
    }
}
