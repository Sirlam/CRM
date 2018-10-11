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

class RoleController extends Controller
{
    //
    public function allRoles(){
      $users = User::all();
      $locations = Pickup::all();
      $roles = Role::all();

      return view('role.allRoles')
            ->with('users', $users)
            ->with('locations', $locations)
            ->with('roles', $roles);
    }

    public function addRole(){
      $locations = Pickup::where('status', 1)->get();
      $roles = Role::all();
      return view('role.addRole')
            ->with('locations', $locations)
            ->with('roles', $roles);
    }

    public function postRole(Request $request){
      $locations = Pickup::where('status', 1)->get();
      $roles = Role::all();
      $users = User::all();

      $validate = Validator::make(Input::all(), array(
         'role_name' => 'required',
      ));

      if($validate->fails()){
          return Redirect::route('addRole')
          ->with('locations', $locations)
          ->with('roles', $roles)
          ->withErrors($validate)->withInput();
      }else {
        // code...
        $role = new Role();
        $role->role_name = $request['role_name'];
        $role->user_level = $request['user_level'];
        $role->created_by = Auth::user()->id;
        $role->last_modified_by = Auth::user()->id;
        $role->parent_id = $request['parent_id'];

        if($role->save()){
              return Redirect::route('allRoles')
              ->with('users', $users)
              ->with('locations', $locations)
              ->with('roles', $roles)
              ->with('success', 'Role Added');
          }else{
              return Redirect::route('allRoles')
              ->with('users', $users)
              ->with('locations', $locations)
              ->with('roles', $roles)
              ->with('fail', 'An error occurred');
          }
      }
    }

    public function editRole($id){
      $locations = Pickup::where('status', 1)->get();
      $role = Role::find($id);
      $roles = Role::all();
      $users = User::all();

      return view('role.editRole')->with('locations', $locations)
              ->with('role', $role)
              ->with('roles', $roles)
              ->with('users', $users);
    }

    public function postEditRole($id){
      $locations = Pickup::where('status', 1)->get();
      $roles = Role::all();
      $role = Role::find($id);
      $users = User::all();

      $validate = Validator::make(Input::all(), array(
         'role_name' => 'required',
      ));

      if($validate->fails()){
          return Redirect::route('editRole', $role->id)
          ->with('role', $role)
          ->with('roles', $roles)
          ->with('users', $users)
          ->withErrors($validate)->withInput();
      }else {
        $role->role_name = Input::get('role_name');
        $role->user_level = Input::get('user_level');
        $role->created_by = Auth::user()->id;
        $role->last_modified_by = Auth::user()->id;
        $role->parent_id = Input::get('parent_id');

        if($role->update()){
              return Redirect::route('allRoles')
              ->with('users', $users)
              ->with('locations', $locations)
              ->with('roles', $roles)
              ->with('success', 'Role Updated');
          }else{
              return Redirect::route('allRoles')
              ->with('users', $users)
              ->with('locations', $locations)
              ->with('roles', $roles)
              ->with('fail', 'An error occurred');
          }
      }
    }
}
