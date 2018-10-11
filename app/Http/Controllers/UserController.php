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
      $locations = Pickup::where('status', 1)->get();
      $roles = Role::all();
      /*$orders = Order::all();
      //$customer_count = Customer::count();
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
                        ->get();*/
      return view('user.dashboard')
              ->with('locations', $locations)
              ->with('roles', $roles);
              /*->with('customer_count', $customer_count)
              ->with('pending', $pending)
              ->with('orders', $orders)
              ->with('sales', $sales);*/
    }

    //Logout User
    public function getLogout(){
        Auth::logout();
        Session::flush();
        return Redirect::route('dashboard');
    }

    public function allUsers(){
      $users = User::all();
      $locations = Pickup::all();
      $roles = Role::all();

      return view('user.allUsers')
            ->with('users', $users)
            ->with('locations', $locations)
            ->with('roles', $roles);
    }

    public function addUser(){
      $locations = Pickup::where('status', 1)->get();
      $roles = Role::all();
      return view('user.addUser')
            ->with('locations', $locations)
            ->with('roles', $roles);
    }

    public function postUser(Request $request){
      $locations = Pickup::where('status', 1)->get();
      $roles = Role::all();
      $users = User::all();

      $validate = Validator::make(Input::all(), array(
         'email' => 'required|unique:oc_agent_profiles',
         'password' => 'required',
         'first_name' => 'required',
         'last_name' => 'required',
      ));

      if($validate->fails()){
          return Redirect::route('addUser')
          ->with('locations', $locations)
          ->with('roles', $roles)
          ->withErrors($validate)->withInput();
      }else {
        // code...
        $user = new User();
        $user->email = $request['email'];
        $user->role_id = $request['role_id'];
        $user->location_id = $request['location_id'];
        $user->password = Hash::make($request['password']);
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->mobile = $request['mobile'];
        $user->name = $request['first_name'] . ' ' . $request['last_name'];
        $user->is_approved = 1;
        $user->is_locked = 0;
        $user->created_by = Auth::user()->id;

        if($user->save()){
              return Redirect::route('allUsers')
              ->with('users', $users)
              ->with('locations', $locations)
              ->with('roles', $roles)
              ->with('success', 'Registration Successful');
          }else{
              return Redirect::route('allUsers')
              ->with('users', $users)
              ->with('locations', $locations)
              ->with('roles', $roles)
              ->with('fail', 'An error occurred');
          }
      }
    }

    public function editUser($id){
      $locations = Pickup::where('status', 1)->get();
      $roles = Role::all();
      $user = User::find($id);

      return view('user.editUser')->with('locations', $locations)
              ->with('roles', $roles)
              ->with('user', $user);
    }

    public function postEditUser($id){
      $locations = Pickup::where('status', 1)->get();
      $roles = Role::all();
      $user = User::find($id);
      $users = User::all();

      $validate = Validator::make(Input::all(), array(
         'email' => 'required',
         'first_name' => 'required',
         'last_name' => 'required',
      ));

      if($validate->fails()){
          return Redirect::route('editUser', $user->id)
          ->with('locations', $locations)
          ->with('roles', $roles)
          ->withErrors($validate)->withInput();
      }else {
        $user->email = Input::get('email');
        $user->role_id = Input::get('role_id');
        $user->location_id = Input::get('location_id');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->mobile = Input::get('mobile');
        $user->name = Input::get('first_name') . ' ' . Input::get('last_name');
        $user->is_approved = 1;
        $user->is_locked = 0;

        if($user->update()){
              return Redirect::route('allUsers')
              ->with('users', $users)
              ->with('locations', $locations)
              ->with('roles', $roles)
              ->with('success', 'User Updated');
          }else{
              return Redirect::route('allUsers')
              ->with('users', $users)
              ->with('locations', $locations)
              ->with('roles', $roles)
              ->with('fail', 'An error occurred');
          }
      }
    }
}
