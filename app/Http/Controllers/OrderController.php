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

use App\Classes\Pickup;
use App\Role;
use App\User;
use App\Classes\Customer;
use App\Classes\Order;
use App\Classes\OrderStatus;

class OrderController extends Controller
{
    //
    public function allOrders(){
      $order_details = Order::getOrdersByPickupId(Auth::user()->location_id)->content;
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      $order_status = OrderStatus::statusByLanguageId(1)->content;
      return view('order.allOrders')
              ->with('order_details', $order_details)
              ->with('locations', $locations)
              ->with('order_status', $order_status)
              ->with('roles', $roles);
    }

    public function sales(){
      $orders = Order::all();
      $sales = DB::table('oc_order')->join('oc_order_history', 'oc_order.order_id', '=', 'oc_order_history.order_id')
                        ->join('oc_order_status', 'oc_order_status.order_status_id', '=', 'oc_order_history.order_status_id')
                        ->join('oc_order_product', 'oc_order.order_id', '=', 'oc_order_product.order_id')
                        ->select('oc_order.order_id', 'oc_order.token', 'oc_order_product.name', 'oc_order_product.quantity', 'oc_order_product.total', 'oc_order_status.name as STATUS')
                        ->whereIn('oc_order_status.order_status_id', [5])->where('oc_order_status.language_id', 1)
                        ->get();
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      return view('order.sales')
              ->with('order', $orders)
              ->with('locations', $locations)
              ->with('sales', $sales)
              ->with('roles', $roles);
    }

    public function order($id){
      $order_details = Order::orderDetailsByOrderId($id)->content[0];
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      $order_status = OrderStatus::statusByLanguageId(1)->content;
      //dd($order_details);
      return view('order.order')
              ->with('order_details', $order_details)
              ->with('order_status', $order_status)
              ->with('locations', $locations)
              ->with('roles', $roles);
    }

    public function postOrder($id){
      $order_details = Order::orderDetailsByOrderId($id)->content[0];
      $locations = Pickup::getPickups()->content;
      $order_status = OrderStatus::statusByLanguageId(1)->content;
      $roles = Role::all();

      $validate = Validator::make(Input::all(), array(
        'token' => 'required',
      ));

      if($validate->fails()){
          return Redirect::back()
          ->with('order_details', $order_details)
          ->with('order_status', $order_status)
          ->with('locations', $locations)
          ->with('roles', $roles)
          ->with('fail', 'Token required')
          ->withInput();
      }else{
        $token = Input::get('token');
        $auth = Hash::check($token, $order_details->token);
        if(!$auth){
          //Enter Imei to save
          return Redirect::route('imei', $order_details->order_id)
          ->with('order_details', $order_details)
          ->with('order_status', $order_status)
          ->with('locations', $locations)
          ->with('roles', $roles)
          ->with('success', 'Order Validated, Enter IMEI');
        }else {
          // code...
          return Redirect::back()
          ->with('order_details', $order_details)
          ->with('order_status', $order_status)
          ->with('locations', $locations)
          ->with('roles', $roles)
          ->with('fail', 'Invalid token');
        }
      }
    }

    public function imei($id){
      $order_details = Order::orderDetailsByOrderId($id)->content[0];
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      $order_status = OrderStatus::statusByLanguageId(1)->content;

      return view('order.imei')
              ->with('order_details', $order_details)
              ->with('order_status', $order_status)
              ->with('locations', $locations)
              ->with('roles', $roles);
    }

    public function postImei($id){
      $order = Order::orderDetailsByOrderId($id)->content[0];
      $order_details = Order::getOrdersByPickupId(Auth::user()->location_id)->content;
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      $order_status = OrderStatus::statusByLanguageId(1)->content;

      $validate = Validator::make(Input::all(), array(
        'imei' => 'required',
      ));

      if($validate->fails()){
          return Redirect::back()
          ->with('order', $order)
          ->with('order_details', $order_details)
          ->with('order_status', $order_status)
          ->with('locations', $locations)
          ->with('roles', $roles)
          ->with('fail', 'IMEI number required')
          ->withInput();
      }else {
          // code...
          return Redirect::route('allOrders')
          ->with('order_details', $order_details)
          ->with('locations', $locations)
          ->with('order_status', $order_status)
          ->with('roles', $roles);
      }
    }
}
