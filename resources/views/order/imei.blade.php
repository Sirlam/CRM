@extends('layout.front.master')
@section('title')
IMEI - {{$order_details->name}}
@endsection

@section('body')
<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">IMEI</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- BUTTONS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">IMEI</h3>
								</div>
								<div class="panel-body">
									@if (Session::has('success'))
						          <span class="help-block text-success"> {{ Session::get('success') }}</span>
		              @elseif (Session::has('fail'))
						          <span class="help-block text-danger"> {{ Session::get('fail') }}</span>
		              @endif
									@if($errors->has('imei'))
											<span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('imei')}}</span>
									@endif
                  <div class="table-responsive">
  									<table class="table project-table">
  										<thead>
  											<tr>
  												<th>Field</th>
  												<th>Value</th>
  											</tr>
  										</thead>
  										<tbody>
												<tbody>
													<tr>
														<td>Order ID:</td>
														<td>{{$order_details->order_id}}</a></td>
													</tr>
													<tr>
														<td>Product:</td>
														<td>{{$order_details->name}}</a></td>
													</tr>
													<tr>
														<td>Name:</td>
														<td>{{$order_details->firstname}} {{$order_details->lastname}}</a></td>
													</tr>
													<tr>
														<td>Phone:</td>
														<td>{{$order_details->telephone}}</a></td>
													</tr>
													<tr>
														<td>Currency:</td>
														<td>{{$order_details->currency_code}}</a></td>
													</tr>
													<tr>
														<td>Quantity</td>
														<td>{{$order_details->quantity}}</td>
													</tr>
													<tr>
														<td>Total</td>
														<td>{{$order_details->total}}</td>
													</tr>
													<tr>
														<td>Date Ordered</td>
														<td>{{$order_details->date_added}}</td>
													</tr>
	  											<tr>
														<td>Status</td>
	  												<td>
															@foreach($order_status as $status)
																@if($status->order_status_id == $order_details->order_status_id)
																	<span class="label label-success">{{$status->name}}</span>
																@endif
															@endforeach
														</td>
	  											</tr>
	  										</tbody>
  										</tbody>
  									</table>
                    @if($order_details->order_status_id == 2 || $order_details->order_status_id == 1)
										<form class="form-horizontal" method="post" action="{{url('postImei/' . $order_details->order_id)}}">
	                    <div class="input-group">
	                      <input type="text" id="imei" name="imei" class="form-control" placeholder="Enter item IMEI number...">
												{{csrf_field()}}
	                      <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
	                    </div>
										</form>
                    @else
                      <p>This order is <span class="label label-danger">{{$order_details->order_status_id}}</span></p>
                    @endif
  								</div>
								</div>
							</div>
							<!-- END BUTTONS -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
@stop
