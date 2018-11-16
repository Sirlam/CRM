@extends('layout.front.master')
@section('title')
Customers
@endsection

@section('body')
<!--MAIN-->
<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">All Customers</h3>
				<div class="row">
					<div class="col-md-12">
						<!-- BORDERED TABLE -->
						<div class="panel">
							<div class="panel-heading">
								<!--<h3 class="panel-title">Customer</h3>-->
								@if (Session::has('success'))
										<span class="help-block text-success"> {{ Session::get('success') }}</span>
								@elseif (Session::has('fail'))
										<span class="help-block text-danger"> {{ Session::get('fail') }}</span>
								@endif
							</div>

							<!--Search Row-->
								<div class="row">
									<table class="table table-responsive" id="exampleSearch">
										<tfoot>
											<tr>
													<th class="hidden"></th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Email</th>
													<th>Phone</th>
											</tr>
										</tfoot>
					        </table>
								</div>

								<div class="row">
									<div class="col-md-7 col-md-offset-5">
										<button type="button" class="btn btn-success" id="search"><i class="fa fa-search"></i> Search</button>
									</div>
								</div>
							<!--Search Row-->

							<!--Row-->
							<div class="row">
								<div class="panel-body fg-scrollabletable">
									<table class="table table-striped" id="myTable">
										<thead>
											<tr>
												<th class="col-sm-3">#</th>
												<th class="col-sm-3">First Name</th>
												<th class="col-sm-3">Last Name</th>
												<th class="col-sm-3">Email</th>
	                      <th class="col-sm-3">Phone</th>
											</tr>
										</thead>
										<tbody>
	                    @foreach($customers as $customer)
											<tr>
												<td><a href="{{url('customer/'.$customer->customer_id)}}" class="btn btn-danger">View</a></td>
												<td>{{$customer->firstname}}</td>
												<td>{{$customer->lastname}}</td>
												<td>{{$customer->email}}</td>
	                      <td>{{$customer->telephone}}</td>
											</tr>
	                    @endforeach
										</tbody>
									</table>
								</div>
							</div>
							<!--End row-->
						</div>
						<!-- END BORDERED TABLE -->
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT -->
	</div>
@stop
