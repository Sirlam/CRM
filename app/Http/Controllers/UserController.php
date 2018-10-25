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
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

use App\Classes\Pickup;
use App\Role;
use App\User;
use App\Sold;
use App\Classes\Customer;
use App\Classes\Order;
use App\Classes\OrderStatus;

class UserController extends Controller
{
    //Get the home page
    public function dashboard(){
      $locations = Pickup::getPickups()->content;
      $customers = Customer::getCustomers(Auth::user()->location_id)->content;
      //$menus = DB::table('oc_agent_permissions')->join('oc_agent_role_perm', 'oc_agent_permissions.id', '=', 'oc_agent_role_perm.permission_id')
      //            ->where('oc_agent_role_perm.role_id', Auth::user()->role_id)->where('oc_agent_permissions.is_active', 1)
      //            ->select('oc_agent_permissions.id', 'oc_agent_role_perm.role_id', 'oc_agent_permissions.permission_description',
      //              'oc_agent_permissions.parent_permission', 'oc_agent_permissions.id_tag', 'oc_agent_permissions.icon_class',
      //              'oc_agent_permissions.route_url', 'oc_agent_permissions.is_open_class', 'oc_agent_permissions.toggle_icon')
      //            ->get();
      $orders = Order::getOrdersByPickupId(Auth::user()->location_id)->content;
      $pending = Order::getOrdersByPickupId(Auth::user()->location_id)->content;
      $sales = Sold::where('pickup_id', Auth::user()->location_id)->get();
      $order_status = OrderStatus::statusByLanguageId(1)->content;

      if(Auth::user()->role_id == 3)
      {
        return view('user.dashboardV2')
                ->with('locations', $locations)
                //->with('menus', $menus)
                ->with('customers', $customers)
                ->with('pending', $pending)
                ->with('orders', $orders)
                ->with('order_status', $order_status)
                ->with('sales', $sales);
      }
      else {
        return view('user.dashboard')
                ->with('locations', $locations)
                ->with('menus', $menus)
                ->with('customers', $customers)
                ->with('pending', $pending)
                ->with('orders', $orders)
                ->with('order_status', $order_status)
                ->with('sales', $sales);
      }

    }

    //Logout User
    public function getLogout(){
        Auth::logout();
        Session::flush();
        return Redirect::route('dashboard');
    }

    public function allUsers(){
      $users = User::all();
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();

      return view('user.allUsers')
            ->with('users', $users)
            ->with('locations', $locations)
            ->with('roles', $roles);
    }

    public function addUser(){
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      return view('user.addUser')
            ->with('locations', $locations)
            ->with('roles', $roles);
    }

    public function postUser(Request $request){
      $locations = Pickup::getPickups()->content;
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
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      $user = User::find($id);

      return view('user.editUser')->with('locations', $locations)
              ->with('roles', $roles)
              ->with('user', $user);
    }

    public function postEditUser($id){
      $locations = Pickup::getPickups()->content;
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
