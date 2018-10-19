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

use App\Classes\Pickup;
use App\Role;
use App\User;
use App\Sold;
use App\Classes\Customer;
use App\Classes\Order;
use App\Classes\OrderStatus;
use App\Permission;

class PermissionController extends Controller
{
    //
    public function allPermissions(){
      $permissions = Permission::all();
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();

      return view('permission.allPermissions')
            ->with('permissions', $permissions)
            ->with('locations', $locations)
            ->with('roles', $roles);
    }

    public function addPermission(){
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      $permissions = Permission::where('parent_permission', 0)->get();
      return view('permission.addPermission')
            ->with('permissions', $permissions)
            ->with('locations', $locations)
            ->with('roles', $roles);
    }

    public function postPermission(Request $request){
      $locations = Pickup::getPickups()->content;
      $roles = Role::all();
      $permissions = Permission::all();

      $validate = Validator::make(Input::all(), array(
         'permission_description' => 'required',
         'route_url' => 'required',
      ));

      if($validate->fails()){
          return Redirect::route('addPermission')
          ->with('locations', $locations)
          ->with('roles', $roles)
          ->withErrors($validate)->withInput();
      }else {
        // code...
        $permission = new Permission();
        $permission->permission_description = $request['permission_description'];
        $permission->route_url = $request['route_url'];
        $permission->parent_permission = $request['parent_permission'];
        $permission->is_active = 1;
        if($permission->parent_permission == 0){
          //generate and store new id tag
          //$new_tag = uniqid("subPage");
          $permission->id_tag = "";
        }else {
          // code...Select the tag of the parent
          $new_tag = Permission::select('route_url')->where('id', $request['parent_permission'])->get();
          dd($new_tag[0]);
          $permission->id_tag = $new_tag;
        }

        $permission->icon_class = $request['icon_class'];
        $permission->is_open_class = $request['is_open_class'];
        $permission->toggle_icon = $request['toggle_icon'];

        if($permission->save()){
          return Redirect::route('allPermissions')
                ->with('permissions', $permissions)
                ->with('locations', $locations)
                ->with('roles', $roles)
                ->with('success', 'Permission Added');
        }else {
          // code...
          return Redirect::route('allPermissions')
                ->with('permissions', $permissions)
                ->with('locations', $locations)
                ->with('roles', $roles)
                ->with('success', 'An error occurred');
        }
      }
    }

}
