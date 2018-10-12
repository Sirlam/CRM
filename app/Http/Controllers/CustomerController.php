<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Classes\Pickup;
use App\Role;
use App\User;
use App\Classes\Customer;
use App\Classes\Order;
use App\Classes\OrderStatus;

class CustomerController extends Controller
{
    //
    public function allCustomers(){
      $customers = Customer::getCustomers(Auth::user()->location_id)->content;
      //$user = Auth::user();
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      //$customer_order_count = Order::where('customer_id', $customers->customer_id)
      return view('customer.allCustomers')
              ->with('customers', $customers)
              //->with('orders', $orders)
              //->with('user', $user)
              ->with('locations', $locations)
              ->with('roles', $roles);
              //->with('customer_order_count', $customer_order_count);
    }

    public function customer($id){
      $customer = Customer::getCustomerById($id)->content;
      $locations = Pickup::getPickups()->content;
      //$user = Auth::user();
      $roles = Role::all();
      $orders = Order::orderByCustomerId($id)->content;
      $order_status = OrderStatus::statusByLanguageId(1)->content;
      /*$pending = DB::table('oc_order')->join('oc_order_history', 'oc_order.order_id', '=', 'oc_order_history.order_id')
                        ->join('oc_order_status', 'oc_order_status.order_status_id', '=', 'oc_order_history.order_status_id')
                        ->select(DB::raw('count(1) as STATUS'))
                        ->where('oc_order.customer_id', $id)->where('oc_order_status.language_id', 1)
                        ->whereIn('oc_order_status.order_status_id', [1,2])
                        ->get();
      */
      return view('customer.customer')
              ->with('customer', $customer)
              ->with('orders', $orders)
              ->with('order_status', $order_status)
              //->with('user', $user)
              ->with('locations', $locations)
              ->with('roles', $roles);
    }
}
