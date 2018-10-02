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
            </div>
            <form class="form-auth-small" action="#">
              <div class="form-group">
                <label for="signin-email" class="control-label sr-only">Agent ID</label>
                <input type="text" class="form-control" id="signin-email" placeholder="Agent ID">
              </div>
              <div class="form-group">
                <label for="signin-password" class="control-label sr-only">Password</label>
                <input type="password" class="form-control" id="signin-password" placeholder="Password">
              </div>
              <div class="form-group clearfix">
                <label class="fancy-checkbox element-left">
                  <input type="checkbox">
                  <span>Remember me</span>
                </label>
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
              <div class="bottom">
                <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
              </div>
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
