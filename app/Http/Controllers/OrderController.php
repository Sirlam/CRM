<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Location;
use App\Pickup;
use App\Role;
use App\User;
use App\Customer;
use App\Order;
use App\OrderHistory;
use App\OrderStatus;

class OrderController extends Controller
{
    //
    public function order($id){
      $order = Order::find($id);
      $user = Auth::user();
      $order_details = DB::table('oc_order')->join('oc_order_history', 'oc_order.order_id', '=', 'oc_order_history.order_id')
                        ->join('oc_order_status', 'oc_order_status.order_status_id', '=', 'oc_order_history.order_status_id')
                        ->join('oc_order_product', 'oc_order.order_id', '=', 'oc_order_product.order_id')
                        ->select('oc_order.order_id', 'oc_order.token', 'oc_order_product.name', 'oc_order_product.quantity', 'oc_order_product.total', 'oc_order_status.name as STATUS')
                        ->where('oc_order.order_id', $id)->where('oc_order_status.language_id', 1)
                        ->first();
      $locations = Pickup::all();
      $roles = Role::all();
      return view('order.order')
              ->with('order', $order)
              ->with('order_details', $order_details)
              ->with('user', $user)
              ->with('locations', $locations)
              ->with('roles', $roles);
    }
}
