@extends('layout.back.master')
@section('title')
Login
@endsection

@section('body')
<!-- WRAPPER -->
<div id="wrapper">
	<div class="vertical-align-wrap">
		<div class="vertical-align-middle">
			<div class="auth-box lockscreen clearfix">
				<div class="content">
					<h1 class="sr-only">Klorofil - Free Bootstrap dashboard</h1>
					<div class="logo text-center"><img src="{{URL::asset('img/logo-dark.png')}}" alt="Klorofil Logo"></div>
					<div class="user text-center">
						<img src="{{URL::asset('img/user-medium.png')}}" class="img-circle" alt="Avatar">
						<h2 class="name">
              @if (Session::has('user'))
                {{ Session::get('user') }}
              @endif
            </h2>
					</div>
					<form action="{{route('post2Fa')}}" method="post" enctype="multipart/form-data">
						<div class="input-group">
              <input type="hidden" class="form-control" id="email" name="email" value="{{ Session::get('user') }}">
							<input type="password" class="form-control" placeholder="Enter your login token ..." id="token" name="token">
              @if($errors->has('token'))
                  <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('token')}}</span>
              @endif
              {{csrf_field()}}
							<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- END WRAPPER -->
@stop
