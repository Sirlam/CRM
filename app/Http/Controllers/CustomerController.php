<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

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
      try{
        $customer = Customer::getCustomerById($id)->content;
      }catch(\Exception $e){
        return Redirect::back()
        ->with('fail', 'Details for this customer does not exist');
      }

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

    public function redeemToken(){
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();

      return view('customer.redeemToken')
              ->with('locations', $locations)
              ->with('roles', $roles);
    }

    public function postRedemToken(Request $request){
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();

      $validate = Validator::make(Input::all(), array(
         'order_id' => 'required',
         'telephone' => 'required',
      ));

      if($validate->fails()){
          return Redirect::route('redeemToken')
            ->with('locations', $locations)
            ->with('roles', $roles)
            ->withErrors($validate)->withInput();
      }
      else {
        $order_id = $request['order_id'];
        $telephone = $request['telephone'];

        try{
          $order = Order::orderDetailsByOrderId($order_id)->content[0];
          //dd($order->telephone);

          if($telephone == $order->telephone){
            $email = $order->email;
            $token = $order->token;

            return Redirect::back()
            ->with('success', 'Order found')
            ->with(['token' => $token])
            ->with(['email' => $email]);
          }else {
            // code...
              return Redirect::back()
              ->with('fail', 'This phone number does not match this order');
            }
        }catch(\Exception $e){
          return Redirect::back()
          ->with('fail', 'This order does not exist');
        }
      }
    }

    public function sendMail(Request $request){
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();

      $token = $request['token'];
      $email = $request['email'];
      $subject = "Redeem Lost Token";
      $body = "The token for your order is <b>" . $token . "</b>";

        try{
          $response = Mail::send( [], [], function (Message $message) use ($email, $body) {
              $message->from ( 'support@wepayng.com', 'WePayng' );
              $message->to($email)->subject ( 'Redeem Lost Token' );
              $message->setBody($body);
          });
            return Redirect::back()
            ->with('success', 'Token has been resent');
          }catch(\Exception $e){
            return Redirect::back()
            ->with('fail', 'Error resending token. Contact administrator');
          }
    }


}
