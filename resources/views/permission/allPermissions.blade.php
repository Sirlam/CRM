@extends('layout.front.master')
@section('title')
Permission Management
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
                    <h3 class="panel-title">Permission</h3>
                    @if (Session::has('success'))
      				          <span class="help-block text-success"> {{ Session::get('success') }}</span>
                    @elseif (Session::has('fail'))
      				          <span class="help-block text-danger"> {{ Session::get('fail') }}</span>
                    @endif
                    <p class="panel-subtitle pull-right"><a href="{{URL::route('addPermission')}}" class="btn btn-success"><i class="fa fa-plus-square"></i> Add New</a></p>
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
          									<table class="table table-bordered table-striped" id="myTable">
          										<thead>
          											<tr>
          												<th>Description</th>
                                  <th>Route URL</th>
                                  <th>Active</th>
                                  <th>Tag</th>
                                  <th>Parent Permission</th>
                                  <th>Edit</th>
          											</tr>
          										</thead>
          										<tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                  <td>{{$permission->permission_description}}</td>
                                  <td>{{$permission->route_url}}</td>
                                  <td>
                                    @if($permission->is_active > 0)
                                      <i class="fa fa-check text-primary"></i>
                                    @else
                                      <i class="fa fa-close text-danger"></i>
                                    @endif
                                  </td>
                                  <td>{{$permission->id_tag}}</td>
                                  <td>{{$permission->parent_permission}}</td>
                                  <td><a href="#" class="btn btn-default">Edit</a></td>
                                </tr>
                                @endforeach
          										</tbody>
          									</table>
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
