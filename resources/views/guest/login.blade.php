@extends('layout.back.master')
@section('title')
Login
@endsection

@section('body')
<!-- WRAPPER -->
<div id="wrapper">
  <div class="vertical-align-wrap">
    <div class="vertical-align-middle">
      <div class="auth-box ">
        <div class="left">
          <div class="content">
            <div class="header">
              <div class="logo text-center"><img src="{{URL::asset('img/logo-dark.png')}}" alt="Klorofil Logo"></div>
              <p class="lead">Login to your account</p>
              @if (Session::has('success'))
				          <span class="help-block text-success"> {{ Session::get('success') }}</span>
              @elseif (Session::has('fail'))
				          <span class="help-block text-danger"> {{ Session::get('fail') }}</span>
              @endif
            </div>
            <form class="form-auth-small" action="{{route('postLogin')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="email" class="control-label sr-only">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                @if($errors->has('email'))
				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('email')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="password" class="control-label sr-only">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                @if($errors->has('password'))
				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('password')}}</span>
				        @endif
              </div>
              <div class="form-group clearfix">
                <label class="fancy-checkbox element-left">
                  <input type="checkbox">
                  <span>Remember me</span>
                </label>
              </div>
              {{csrf_field()}}
              <button type="submit" class="btn btn-success btn-lg btn-block">LOGIN</button>
              <div class="bottom">
                <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span><br>
                <!--<a href="{{URL::route('register')}}" class="btn btn-danger btn-lg btn-block">Create User</a></span>-->
              </div>
            </form>
          </div>
        </div>
        <div class="right">
          <div class="overlay"></div>
          <div class="content text">
            <h1 class="heading">Customer Relationship Manager</h1>
            <!--<p>by Bluechip Technologies Ltd</p>-->
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!-- END WRAPPER -->
@stop
