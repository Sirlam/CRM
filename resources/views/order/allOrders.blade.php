@extends('layout.front.master')
@section('title')
Pending Orders
@endsection

@section('body')
<!--MAIN-->
<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Pending Orders</h3>
				<div class="row">
					<div class="col-md-12">
						<!-- BORDERED TABLE -->
						<div class="panel">
							<div class="panel-heading">
								<!--<h3 class="panel-title">Order</h3>-->
								@if (Session::has('success'))
										<span class="help-block text-success"> {{ Session::get('success') }}</span>
								@elseif (Session::has('fail'))
										<span class="help-block text-danger"> {{ Session::get('fail') }}</span>
								@endif
							</div>
							<!--Search Row-->
							<!--<form class="form-horizontal" role="form">-->
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<div class="col-md-4">
												<label for="order_id">Order ID</label>
											</div>
											<div class="col-md-8">
												<input type="text" class="form-control" id="param" name="order_id">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-4">
												<label for="telephone">Phone</label>
											</div>
											<div class="col-md-8">
												<input type="text" class="form-control" id="param2" name="telephone">
											</div>
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<div class="col-md-4">
												<label for="name">Customer Name</label>
											</div>
											<div class="col-md-8">
												<input type="text" class="form-control" id="param3" name="name">
											</div>
										</div>
									</div>
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
											<th class="col-sm-1">Order ID</th>
											<th class="col-sm-1">Product</th>
											<th class="col-sm-2">Customer Name</th>
											<th class="col-sm-1">Phone</th>
											<th class="col-sm-1">Quantity</th>
											<th class="col-sm-1">Total</th>
											<th class="col-sm-1">Order Date</th>
                      <th class="col-sm-1">Status</th>
										</tr>
									</thead>
									<tbody>
                    @foreach($order_details as $order_detail)
										<tr>
											<td>{{$order_detail->order_id}}</td>
											<td><a href="{{url('order/'.$order_detail->order_id)}}">{{$order_detail->name}}</a></td>
											<td><a href="{{url('customer/'.$order_detail->customer_id)}}">{{$order_detail->firstname}}  {{$order_detail->lastname}}</td>
											<td>{{$order_detail->telephone}}</td>
											<td>{{$order_detail->quantity}}</td>
											<td>{{$order_detail->currency_code}} {{$order_detail->total}}</td>
											<td>{{$order_detail->date_added}}</td>
                      <td>
												@foreach($order_status as $status)
													@if($status->order_status_id == $order_detail->order_status_id)
														<span class="label label-success">{{$status->name}}</span>
													@endif
												@endforeach
											</td>
										</tr>
                    @endforeach
									</tbody>
									<!--<tfoot>
				            <tr>
				                <th>Order ID</th>
				                <th>Name</th>
				            </tr>
				        </tfoot>-->
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
