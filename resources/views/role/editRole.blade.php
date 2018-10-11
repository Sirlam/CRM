@extends('layout.front.master')
@section('title')
Edit Role
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
                    <h3 class="panel-title">Role - {{$role->role_name}} <small><i class="fa fa-arrow-circle-left"></i><a href="{{route('allRoles')}}">To List</a></small></h3>
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
                            <form class="form-horizontal" action="{{url('postEditRole/' . $role->id)}}" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="role_name" class="control-label col-sm-2">Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="role_name" name="role_name" placeholder="* Name" value="{{$role->role_name}}">
                                  @if($errors->has('role_name'))
                  				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('role_name')}}</span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="user_level" class="control-label col-sm-2">Authorization Level</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="user_level" id="user_level">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                   </select>
                                 </div>
                              </div>

                              <div class="form-group">
                                <label for="parent_id" class="control-label col-sm-2">Parent Role</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="parent_id" id="parent_id">
                  			             @foreach($roles as $item)
                    			              <option value="{{$item->id}}" @if($item->id == $role->id) selected="selected" @endif>{{$item->role_name}}</option>
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
