@extends('layout.back.master')
@section('title')
Register
@endsection

@section('body')
<!-- WRAPPER -->
<div id="wrapper">
  <div class="vertical-align-wrap">
    <div class="vertical-align-middle">
      <div class="auth-box">
        <div class="left">
          <div class="content">
            <div class="header">
              <div class="logo text-center"><img src="{{URL::asset('img/logo-dark.png')}}" alt="Klorofil Logo"></div>
              <p class="lead">Create User
              <span class="helper-text text-danger">* fiels are compulsory</span>
              </p>
              @if (Session::has('success'))
				          <span class="help-block text-primary"> {{ Session::get('success') }}</span>
              @elseif (Session::has('fail'))
				          <span class="help-block text-danger"> {{ Session::get('fail') }}</span>
              @endif
            <form class="form-auth-small" action="{{route('postRegister')}}" method="post" enctype="multipart/form-data">
            </div>
              <div class="form-group">
                <label for="email" class="control-label sr-only">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="* Email">
                @if($errors->has('email'))
				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('email')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="role_id" class="control-label sr-only">Role</label>
                <select class="form-control" name="role_id" id="role_id">
			             @foreach($roles as $item)
  			              <option value="{{$item->id}}">{{$item->role_name}}</option>
                   @endforeach
                 </select>
              </div>
              <div class="form-group">
                <label for="password" class="control-label sr-only">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="* Password">
                @if($errors->has('password'))
				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('password')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="first_name" class="control-label sr-only">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="* First Name">
                @if($errors->has('first_name'))
				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('first_name')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="last_name" class="control-label sr-only">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="* Last Name">
                @if($errors->has('last_name'))
				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('last_name')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="mobile" class="control-label sr-only">Phone No</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone No">
              </div>
              <div class="form-group">
                <label for="role_id" class="control-label sr-only">Location</label>
                <select class="form-control" name="location_id" id="location_id">
			             @foreach($locations as $item)
  			              <option value="{{$item->pickup_id}}">{{$item->name}}</option>
                   @endforeach
                 </select>
              </div>
              {{csrf_field()}}
              <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
              <!--<div class="bottom">
                <span class="helper-text"><i class="fa fa-user"></i> <a href="{{URL::route('login')}}">Login</a></span>
              </div>-->
            </form>
          </div>
        </div>
        <div class="right">
          <div class="overlay"></div>
          <div class="content text">
            <h1 class="heading">CRM Administration Portal for Order Management</h1>
            <p>by Bluechip Technologies Ltd</p>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!-- END WRAPPER -->
@stop
