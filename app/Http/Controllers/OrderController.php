<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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
    public function allOrders(){
      $orders = Order::all();
      $user = Auth::user();
      $order_details = DB::table('oc_order')->join('oc_order_history', 'oc_order.order_id', '=', 'oc_order_history.order_id')
                        ->join('oc_order_status', 'oc_order_status.order_status_id', '=', 'oc_order_history.order_status_id')
                        ->join('oc_order_product', 'oc_order.order_id', '=', 'oc_order_product.order_id')
                        ->select('oc_order.order_id', 'oc_order.token', 'oc_order_product.name', 'oc_order_product.quantity', 'oc_order_product.total', 'oc_order_status.name as STATUS')
                        ->where('oc_order_status.language_id', 1)->orderBy('oc_order_status.name', 'asc')
                        ->get();
      $locations = Pickup::all();
      $roles = Role::all();
      return view('order.allOrders')
              ->with('orders', $orders)
              ->with('order_details', $order_details)
              ->with('user', $user)
              ->with('locations', $locations)
              ->with('roles', $roles);
    }

    public function sales(){
      $orders = Order::all();
      $user = Auth::user();
      $sales = DB::table('oc_order')->join('oc_order_history', 'oc_order.order_id', '=', 'oc_order_history.order_id')
                        ->join('oc_order_status', 'oc_order_status.order_status_id', '=', 'oc_order_history.order_status_id')
                        ->join('oc_order_product', 'oc_order.order_id', '=', 'oc_order_product.order_id')
                        ->select('oc_order.order_id', 'oc_order.token', 'oc_order_product.name', 'oc_order_product.quantity', 'oc_order_product.total', 'oc_order_status.name as STATUS')
                        ->whereIn('oc_order_status.order_status_id', [5])->where('oc_order_status.language_id', 1)
                        ->get();
      $locations = Pickup::all();
      $roles = Role::all();
      return view('order.sales')
              ->with('order', $orders)
              ->with('sales', $sales)
              ->with('user', $user)
              ->with('locations', $locations)
              ->with('roles', $roles);
    }

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

    public function postOrder($id){
      $order = Order::find($id);
      $user = Auth::user();
      $order_details = DB::table('oc_order')->join('oc_order_history', 'oc_order.order_id', '=', 'oc_order_history.order_id')
                        ->join('oc_order_status', 'oc_order_status.order_status_id', '=', 'oc_order_history.order_status_id')
                        ->join('oc_order_product', 'oc_order.order_id', '=', 'oc_order_product.order_id')
                        ->select('oc_order.order_id', 'oc_order.token', 'oc_order_product.name', 'oc_order_product.quantity', 'oc_order_product.total', 'oc_order_status.name as STATUS')
                        ->where('oc_order.order_id', $id)->where('oc_order_status.language_id', 1)
                        ->first();
      $order_history = OrderHistory::where('order_id', $id)->first();
      $locations = Pickup::all();
      $roles = Role::all();

      $validate = Validator::make(Input::all(), array(
        'token' => 'required',
      ));

      if($validate->fails()){
          return Redirect::back()
          ->with('order', $order)
          ->with('order_details', $order_details)
          ->with('user', $user)
          ->with('locations', $locations)
          ->with('roles', $roles)
          ->with('fail', 'Token required')
          ->withInput();
      }else{
        $token = Input::get('token');
        $auth = Hash::check($token, $order_details->token);
        if($auth){
          $order_history->order_status_id = 5;
          if($order_history->update()){
            return Redirect::back()
            ->with('order', $order)
            ->with('order_details', $order_details)
            ->with('user', $user)
            ->with('locations', $locations)
            ->with('roles', $roles)
            ->with('success', 'Order Validated');
          }
        }else {
          // code...
          return Redirect::back()
          ->with('order', $order)
          ->with('order_details', $order_details)
          ->with('user', $user)
          ->with('locations', $locations)
          ->with('roles', $roles)
          ->with('fail', 'Invalid token');
        }
      }
    }
}
