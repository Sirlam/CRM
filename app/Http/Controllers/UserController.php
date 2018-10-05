<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Location;
use App\Pickup;
use App\Role;
use App\User;
use App\Customer;

class UserController extends Controller
{
    //Get the home page
    public function dashboard(){
      $locations = Pickup::all();
      $roles = Role::all();
      $customer_count = Customer::count();
      return view('user.dashboard')
              ->with('locations', $locations)
              ->with('roles', $roles)
              ->with('customer_count', $customer_count);
    }

    //Logout User
    public function getLogout(){
        Auth::logout();
        Session::flush();
        return Redirect::route('dashboard');
    }
}
