<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Classes\Pickup;
use App\Role;
use App\User;
use App\Sold;
use App\PermissionXref;
use App\Classes\Customer;
use App\Classes\Order;
use App\Classes\OrderStatus;
use App\Permission;

class ReportController extends Controller
{
    //
    public function pendingReport(){
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();

      return view('report.pendingReport')
              ->with('locations', $locations)
              ->with('roles', $roles);
    }

    public function redeemedReport(){
      $locations = Pickup::getPickups()->content;
      $sold = Sold::all();
      $roles = Role::all();

      return view('report.redeemedReport')
              ->with('sold', $sold)
              ->with('locations', $locations)
              ->with('roles', $roles);
    }
}
