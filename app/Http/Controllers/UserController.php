<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Location;
use App\Pickup;
use App\Role;
use App\User;
use App\Customer;
use App\Order;

class UserController extends Controller
{
    //Get the home page
    public function dashboard(){
      $locations = Pickup::all();
      $roles = Role::all();
      $orders = Order::all();
      $customer_count = Customer::count();
      $pending = DB::table('oc_order')->join('oc_order_history', 'oc_order.order_id', '=', 'oc_order_history.order_id')
                        ->join('oc_order_status', 'oc_order_status.order_status_id', '=', 'oc_order_history.order_status_id')
                        ->join('oc_order_product', 'oc_order.order_id', '=', 'oc_order_product.order_id')
                        ->select('oc_order.order_id', 'oc_order.token', 'oc_order_product.name', 'oc_order_product.quantity', 'oc_order_product.total', 'oc_order_status.name as STATUS')
                        ->whereIn('oc_order_status.order_status_id', [1,2])->where('oc_order_status.language_id', 1)
                        ->get();
      $sales = DB::table('oc_order')->join('oc_order_history', 'oc_order.order_id', '=', 'oc_order_history.order_id')
                        ->join('oc_order_status', 'oc_order_status.order_status_id', '=', 'oc_order_history.order_status_id')
                        ->join('oc_order_product', 'oc_order.order_id', '=', 'oc_order_product.order_id')
                        ->select('oc_order.order_id', 'oc_order.token', 'oc_order_product.name', 'oc_order_product.quantity', 'oc_order_product.total', 'oc_order_status.name as STATUS')
                        ->whereIn('oc_order_status.order_status_id', [5])->where('oc_order_status.language_id', 1)
                        ->get();
      return view('user.dashboard')
              ->with('locations', $locations)
              ->with('roles', $roles)
              ->with('customer_count', $customer_count)
              ->with('pending', $pending)
              ->with('orders', $orders)
              ->with('sales', $sales);
    }

    //Logout User
    public function getLogout(){
        Auth::logout();
        Session::flush();
        return Redirect::route('dashboard');
    }
}
