<?php
namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Location;
use App\Role;
use App\User;
use App\Pickup;
use Carbon\Carbon;

class GuestController extends Controller
{
  //Get login view
  public function getLogin(){
    return view('guest.login');
  }

  public function getRegister(){
    $locations = Pickup::where('status', 1)->get();
    $roles = Role::all();
    return view('guest.register')->with('locations', $locations)->with('roles', $roles);
  }

  public function get2Fa(){
    return view('guest.2Fa');
  }

  public function postRegister(Request $request){
        $validate = Validator::make(Input::all(), array(
           'email' => 'required|unique:oc_agent_profiles',
           'password' => 'required',
           'first_name' => 'required',
           'last_name' => 'required',
        ));

        if($validate->fails()){
            return Redirect::route('register')->withErrors($validate)->withInput();
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
          $user->created_by = 1;

          if($user->save()){
                return Redirect::route('login')->with('success', 'Registration Successful');
            }else{
                return Redirect::route('register')->with('fail', 'An error occurred');
            }
        }
    }

    public function postLogin(Request $request){
      $validator = Validator::make(Input::all(),array(
            'email' => 'required',
            'password' => 'required'
        ));
        if($validator->fails()){
            return Redirect::route('login')->withErrors($validator)->withInput();
        }else{
            //Check if email and password_main match
            //$remember = (Input::has('remember')) ? true : false;
            $email = $request['email'];
            $auth = Auth::validate(array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ));
            //dd($auth);

            if ($auth) {
                $token = Hash::make("12345"); //hard coded token
                $date_sent = Carbon::now();
                $date_expire = $date_sent->addMinutes(5);
                $user = User::where('email', $email)->first();
                $user->token = $token;
                $user->token_sent = $date_sent;
                $user->token_expire = $date_expire;

                if($user->update()){
                  //return Redirect::route('2Fa', array('user' => $user));
                  return Redirect::route('2Fa')->with('user', $user->email);
                }
            } else {
                return Redirect::route('login')->with('fail', 'Invalid username and password');
            }
        }
    }

    public function post2Fa(Request $request){
      $validator = Validator::make(Input::all(),array(
            'email' => 'required',
            'token' => 'required'
        ));

        if($validator->fails()){
            return Redirect::route('2Fa')->withErrors($validator)->with('user', Input::get('email'))->withInput();
        }else {
          // code...
          $email = Input::get('email');
          $today = Carbon::now();
          $token = Input::get('token');
          $user = User::where('email', $email)->first();

          $auth = Hash::check($token, $user->token);

          if ($auth) {
            $user->last_login_date = $today;
            if($user->update()){
              Auth::login($user);
              $user = Auth::User();
              return Redirect::intended('/')->with('user', $user);
            }
          }else {
            // code...
            return Redirect::route('2Fa')->with('fail', 'Invalid token')->with('user', Input::get('email'));
          }
        }
    }
}
