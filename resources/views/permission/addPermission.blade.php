@extends('layout.front.master')
@section('title')
Add Permission
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
                    <h3 class="panel-title">Permission <small><i class="fa fa-arrow-circle-left"></i><a href="{{route('allPermissions')}}">To List</a></small></h3>
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
                            <form class="form-horizontal" action="{{route('postPermission')}}" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="permission_description" class="control-label col-sm-2">Description</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="permission_description" name="permission_description" placeholder="* Description">
                                  @if($errors->has('permission_description'))
                  				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('permission_description')}}</span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="route_url" class="control-label col-sm-2">Route URL</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="route_url" name="route_url" placeholder="* Route URL">
                                  @if($errors->has('route_url'))
                  				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('route_url')}}</span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="parent_permission" class="control-label col-sm-2">Parent Permission</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="parent_permission" id="parent_permission">
                                        <option value="0">None</option>
                  			             @foreach($permissions as $item)
                    			              <option value="{{$item->id}}">{{$item->permission_description}}</option>
                                     @endforeach
                                   </select>
                                 </div>
                              </div>

                              <div class="form-group">
                                <label for="icon_class" class="control-label col-sm-2">Icon Class</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="icon_class" name="icon_class" placeholder="Icon Class">
                                  @if($errors->has('icon_class'))
                  				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('icon_class')}}</span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="is_open_class" class="control-label col-sm-2">Is Open Class</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="is_open_class" name="is_open_class" placeholder="Is Open Class">
                                  @if($errors->has('is_open_class'))
                  				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('is_open_class')}}</span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="toggle_icon" class="control-label col-sm-2">Toggle Icon</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="toggle_icon" name="toggle_icon" placeholder="Toggle Icon">
                                  @if($errors->has('toggle_icon'))
                  				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('toggle_icon')}}</span>
                                  @endif
                                </div>
                              </div>

                              <!--
                              <br>
                              <h3 class="panel-title text-center">Add Roles to Permission</h3>
                              <br>

                              <div class="form-group">
                                <label for="role_id" class="control-label col-sm-2">Roles</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="role_id" id="example-getting-started" multiple="multiple">
                                    <div class="container">
                                      <div class="row">
                  			                 @foreach($roles as $item)
                                            <option value="{{$item->id}}"> {{$item->role_name}}</option>
                                          @endforeach
                                       </div>
                                     </div>
                                  </select>
                                 </div>
                              </div>-->

                              <div class="form-group">
                                {{csrf_field()}}
                                <div class="col-sm-10 col-sm-offset-2">
                                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> SAVE</button>
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
