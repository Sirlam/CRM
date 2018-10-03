<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Location;
use App\Role;

class GuestController extends Controller
{
  //Get login view
  public function getLogin(){
    return view('guest.login');
  }

  public function getRegister(){
    $locations = Location::all();
    $role = Role::all();
    return view('guest.register')->with('locations', $locations)->with('role', $role);
  }
}
