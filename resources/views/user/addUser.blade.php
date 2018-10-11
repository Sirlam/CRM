@extends('layout.front.master')
@section('title')
Add User
@endsection

@section('body')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">User <small><i class="fa fa-arrow-circle-left"></i><a href="{{route('allUsers')}}">To List</a></small></h3>
                </div>
                <div class="panel-body">
                    <!--ROW-->
                    <div class="row">
          						<div class="col-md-12">
          							<!-- RECENT PURCHASES -->
          							<div class="panel">
          								<div class="panel-heading">
          									<!--<h3 class="panel-title">Pending Orders</h3>
          									<div class="right">
          										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
          										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
          									</div>-->
          								</div>
          								<div class="panel-body no-padding">
                            <form class="form-horizontal" action="{{route('postUser')}}" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="email" class="control-label col-sm-2">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="email" name="email" placeholder="* Email">
                                  @if($errors->has('email'))
                  				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('email')}}</span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="role_id" class="control-label col-sm-2">Role</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="role_id" id="role_id">
                  			             @foreach($roles as $item)
                    			              <option value="{{$item->id}}">{{$item->role_name}}</option>
                                     @endforeach
                                   </select>
                                 </div>
                              </div>

                              <div class="form-group">
                                <label for="password" class="control-label col-sm-2">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="* Password">
                                  @if($errors->has('password'))
                  				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('password')}}</span>
                                  @endif
                                  <input type="checkbox"  onclick="showPassword();"> Show Password
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="first_name" class="control-label col-sm-2">First Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="* First Name">
                                  @if($errors->has('first_name'))
                  				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('first_name')}}</span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="last_name" class="control-label col-sm-2">Last Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="* Last Name">
                                  @if($errors->has('last_name'))
                  				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('last_name')}}</span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="mobile" class="control-label col-sm-2">Phone No</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone No">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="role_id" class="control-label col-sm-2">Location</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="location_id" id="location_id">
                  			             @foreach($locations as $item)
                    			              <option value="{{$item->pickup_id}}">{{$item->name}}</option>
                                     @endforeach
                                   </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                {{csrf_field()}}
                                <div class="col-sm-10 col-sm-offset-2">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SAVE</button>
                                </div>
                              </div>
                            </form>
                            </div>
          								</div>
          								<div class="panel-footer">
          									<!--<div class="row">
          										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Recent</span></div>
          										<div class="col-md-6 text-right"><a href="{{URL::route('allOrders')}}" class="btn btn-primary">View All Orders</a></div>
          									</div>-->
          								</div>
          							</div>
          							<!-- END RECENT PURCHASES -->
          						</div>
          					</div>
                    <!--END ROW-->
                  </div>
                  <!-- END PANEL BODY -->
                </div>
                <!-- END PANEL -->
              </div>
              <!-- END CONTAINER FLUID -->
  </div>
  <!-- END MAIN CONTENT -->
</div>

@stop
