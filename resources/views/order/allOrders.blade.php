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
							<div class="panel-body fg-scrollabletable">
								<table class="table table-bordered table-striped" id="myTable" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Order ID</th>
											<th>Product</th>
											<th>Customer Name</th>
											<th>Phone</th>
											<th>Quantity</th>
											<th>Total</th>
											<th>Order Date</th>
                      <th>Status</th>
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
