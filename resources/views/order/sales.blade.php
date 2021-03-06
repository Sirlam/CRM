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
							<!--<form class="form-horizontal" role="form">-->
							<div class="row">
								<table class="table table-responsive" id="exampleSearch">
									<tfoot>
										<tr>
												<th>Order ID</th>
												<th>Product</th>
												<th>Customer Name</th>
												<th>Phone</th>
										</tr>
									</tfoot>
				        </table>
							</div>

							<div class="row">
								<div class="col-md-7 col-md-offset-5">
									<button type="button" id="search" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
								</div>
							</div>

							<!--</form>-->
							<!--Search Row-->

							<div class="panel-body fg-scrollabletable">
								<table class="table table-striped" id="myTable">
									<thead>
										<tr>
											<th class="col-sm-2">Order ID</td>
											<th class="col-sm-2">Customer ID</td>
											<th class="col-sm-2">Redeemed Date</th>
											<th class="col-sm-2">Customer</th>
											<th class="col-sm-2">Phone</th>
											<th class="col-sm-2">Name</th>
											<th class="col-sm-2">Quantity</th>
											<th class="col-sm-2">Amount</th>
											<th class="col-sm-2">Location</th>
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
