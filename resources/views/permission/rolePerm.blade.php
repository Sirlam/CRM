@extends('layout.front.master')
@section('title')
Add Roles to Permission
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
                    <h3 class="panel-title">Add Roles to Permission <small><i class="fa fa-arrow-circle-left"></i><a href="{{route('allPermissions')}}">To List</a></small></h3>
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
                            <form class="form-horizontal" action="{{url('postRolePerm/' . $permission->id)}}" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="toggle_icon" class="control-label col-sm-2">Description</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="permission_description" name="permission_description" placeholder="Description" value="{{$permission->permission_description}}"  disabled="disabled">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="role_id" class="control-label col-sm-2">Roles</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="role_id[]" id="example-getting-started" multiple="multiple">
                                    <div class="container">
                                      <div class="row">
                  			                 @foreach($roles as $item)
                                            <option value="{{$item->id}}"> {{$item->role_name}}</option>
                                          @endforeach
                                       </div>
                                     </div>
                                  </select>
                                 </div>
                              </div>

                              <div class="form-group">
                                {{csrf_field()}}
                                <div class="col-sm-10 col-sm-offset-2">
                                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> SAVE</button>
                                </div>
                              </div>

                              <br>
                              <h4 class="text-center">Existing roles mapped to permission</h4>
                              @foreach($permissionxref as $perms)
                                <div class="form-group">
                                  @foreach($roles as $role)
                                    @if($perms->role_id == $role->id)
                                      <label for="role_id" class="control-label col-sm-2">{{$role->role_name}}</label>
                                    @endif
                                  @endforeach
                                  <div class="col-sm-10">
                                    <a href="{{url('deleteRolePerm/' . $perms->role_id)}}" class="btn btn-danger"><i class="fa fa-trash"> Delete</a>
                                  </div>
                                </div>
                              @endforeach
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
