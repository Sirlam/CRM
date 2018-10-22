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
							</div>
							<div class="panel-body">
								<table class="table table-bordered table-striped" id="myTable">
									<thead>
										<tr>
											<th>#</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Email</th>
                      <th>Phone</th>
                      <th>Total Orders</th>
                      <th>Pending Orders</th>
										</tr>
									</thead>
									<tbody>
                    @foreach($customers as $customer)
										<tr>
											<td><a href="{{url('customer/'.$customer->customer_id)}}" class="btn btn-success">View</a></td>
											<td>{{$customer->firstname}}</td>
											<td>{{$customer->lastname}}</td>
											<td>{{$customer->email}}</td>
                      <td>{{$customer->telephone}}</td>
                      <td></td>
                      <td></td>
										</tr>
                    @endforeach
									</tbody>
								</table>
							</div>
						</div>
						<!-- END BORDERED TABLE -->
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT -->
	</div>
@stop
