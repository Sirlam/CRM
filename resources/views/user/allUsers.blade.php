@extends('layout.front.master')
@section('title')
User Management
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
                    <h3 class="panel-title">Users</h3>
                    @if (Session::has('success'))
      				          <span class="help-block text-success"> {{ Session::get('success') }}</span>
                    @elseif (Session::has('fail'))
      				          <span class="help-block text-danger"> {{ Session::get('fail') }}</span>
                    @endif
                    <p class="panel-subtitle pull-right"><a href="{{route('addUser')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add New</a></p>
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
          												<th>Email</th>
                                  <th>Full Name</th>
                                  <th>Mobile</th>
          												<th>Role</th>
          												<th>Active</th>
                                  <th>Created Date</th>
                                  <th>Last Login Date</th>
                                  <th>Edit</th>
          											</tr>
          										</thead>
          										<tbody>
                                @foreach($users as $user)
                                <tr>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->mobile}}</td>
                                  <td>
                                    @foreach($roles as $role)
                                      @if($user->role_id == $role->id)
                                        {{$role->role_name}}
                                      @endif
                                    @endforeach
                                  </td>
                                  <td>
                                    @if($user->is_locked > 0)
                                      <i class="fa fa-close text-danger"></i>
                                    @else
                                      <i class="fa fa-check text-primary"></i>
                                    @endif
                                  </td>
                                  <td>{{$user->created_at}}</td>
                                  <td>{{$user->last_login_date}}</td>
                                  <td><a href="{{url('editUser/' . $user->id)}}" class="btn btn-default">Edit</a></td>
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
