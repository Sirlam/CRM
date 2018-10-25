@extends('layout.front.master')
@section('title')
Redeemed Orders
@endsection

@section('body')
<!--MAIN-->
<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Redeemed Orders</h3>
				<div class="row">
					<div class="col-md-12">
						<!-- BORDERED TABLE -->
						<div class="panel">
							<div class="panel-heading">
								<!--<h3 class="panel-title">Sales</h3>-->
							</div>

							<!--Search Row-->
							<form class="form-horizontal" role="form">
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<div class="col-md-4">
												<label for="order_id">Order ID</label>
											</div>
											<div class="col-md-8">
												<input type="text" class="form-control" id="order_id" name="order_id">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-4">
												<label for="telephone">Phone</label>
											</div>
											<div class="col-md-8">
												<input type="text" class="form-control" id="telephone" name="telephone">
											</div>
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<div class="col-md-4">
												<label for="name">Customer Name</label>
											</div>
											<div class="col-md-8">
												<input type="text" class="form-control" id="name" name="name">
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-7 col-md-offset-5">
										<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
									</div>
								</div>
							</form>
							<!--Search Row-->

							<div class="panel-body fg-scrollabletable">
								<table class="table table-striped" id="myTable">
									<thead>
										<tr>
											<th>Order ID</td>
											<th>Customer ID</td>
											<th>Redeemed Date</th>
											<th>Customer</th>
											<th>Phone</th>
											<th>Name</th>
											<th>Quantity</th>
											<th>Amount</th>
											<th>Location</th>
										</tr>
									</thead>
									<tbody>
                    @foreach($sales as $sale)
										<tr>
											<td>{{$sale->order_id}}</td>
											<td>{{$sale->customer_id}}</td>
											<td>{{$sale->created_at}}</td>
											<td>{{$sale->firstname}} {{$sale->lastname}}</td>
											<td>{{$sale->telephone}}</td>
											<td>{{$sale->name}}</td>
											<td>{{$sale->quantity}}</td>
											<td>{{$sale->total}}</td>
											<td>
												@foreach($locations as $location)
													@if($sale->pickup_id == $location->pickup_id)
														{{$location->name}}
													@endif
												@endforeach
											</td>
										</tr>
                    @endforeach
                    <tr>
                      <td>Total</td>
                      <td></td>
											<td></td>
											<td></td>
											<!--<td></td>-->
											<td></td>
											<td></td>
											<td>{{$sales->sum('quantity')}}</td>
                      <td>{{$sales->sum('total')}}</td>
											<td></td>
                    </tr>
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
