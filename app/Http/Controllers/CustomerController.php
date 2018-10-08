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
class CustomerController extends Controller
{
    //
    public function allCustomers(){
      $customers = Customer::all();
      $user = Auth::user();
      $orders = Order::all();
      $order_history = OrderHistory::all();
      $order_status = OrderStatus::all();
      $locations = Pickup::all();
      $roles = Role::all();
      //$customer_order_count = Order::where('customer_id', $customers->customer_id)
      return view('customer.allCustomers')
              ->with('customers', $customers)
              ->with('orders', $orders)
              ->with('user', $user)
              ->with('locations', $locations)
              ->with('roles', $roles);
              //->with('customer_order_count', $customer_order_count);
    }

    public function customer($id){
      $customer = Customer::find($id);
      $user = Auth::user();
      $orders = Order::where('customer_id', $id)->distinct()->get();;
      $pending = DB::table('oc_order')->join('oc_order_history', 'oc_order.order_id', '=', 'oc_order_history.order_id')
                        ->join('oc_order_status', 'oc_order_status.order_status_id', '=', 'oc_order_history.order_status_id')
                        ->select(DB::raw('count(1) as STATUS'))
                        ->where('oc_order.customer_id', $id)->where('oc_order_status.language_id', 1)
                        ->whereIn('oc_order_status.order_status_id', [1,2])
                        ->get();
      $order_summary = DB::table('oc_order')->join('oc_order_history', 'oc_order.order_id', '=', 'oc_order_history.order_id')
                        ->join('oc_order_status', 'oc_order_status.order_status_id', '=', 'oc_order_history.order_status_id')
                        ->join('oc_order_product', 'oc_order.order_id', '=', 'oc_order_product.order_id')
                        ->select('oc_order.order_id', 'oc_order_product.name', 'oc_order_product.quantity', 'oc_order_product.total', 'oc_order_status.name as STATUS')
                        ->where('oc_order.customer_id', $id)->where('oc_order_status.language_id', 1)
                        ->get();
      $locations = Pickup::all();
      $roles = Role::all();
      return view('customer.customer')
              ->with('customer', $customer)
              ->with('orders', $orders)
              ->with('order_summary', $order_summary)
              ->with('user', $user)
              ->with('locations', $locations)
              ->with('roles', $roles);
    }
}
