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
use App\Sold;
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
      $sales = Sold::where('pickup_id', Auth::user()->location_id)->get();
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      return view('order.sales')
              ->with('locations', $locations)
              ->with('sales', $sales)
              ->with('roles', $roles);
    }

    public function order($id){
      try{
        $order_details = Order::orderDetailsByOrderId($id)->content[0];
      }catch(\Exception $e){
        return Redirect::back()
        ->with('fail', 'Details for this order does not exist');
      }

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
        //$auth = Hash::check($token, $order_details->token);
        $auth = $token === $order_details->token;
        if($auth){
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
          $sold = new Sold();
          $sold->order_id = $order->order_id;
          $sold->customer_id = $order->customer_id;
          $sold->imei_number = Input::get('imei');
          $sold->firstname = $order->firstname;
          $sold->lastname = $order->lastname;
          $sold->telephone = $order->telephone;
          $sold->email = $order->email;
          $sold->currency_id = $order->currency_id;
          $sold->currency_code = $order->currency_code;
          $sold->total = $order->total;
          $sold->name = $order->name;
          $sold->quantity = $order->quantity;
          $sold->pickup_id = $order->pick_up;

          try {
            if($sold->save()){
              return Redirect::route('allOrders')
              ->with('order_details', $order_details)
              ->with('locations', $locations)
              ->with('order_status', $order_status)
              ->with('roles', $roles)
              ->with('success', 'Redeemed Succesfully');
            }            
          } catch (\Exception $e) {
            return Redirect::back()
            ->with('order', $order)
            ->with('order_details', $order_details)
            ->with('order_status', $order_status)
            ->with('locations', $locations)
            ->with('roles', $roles)
            ->with('fail', 'This item has been Redeemed or IMEI used!')
            ->withInput();
          }
      }
    }
}
