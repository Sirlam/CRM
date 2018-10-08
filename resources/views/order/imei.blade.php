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
  												<th>Product</th>
  												<th>Quantity</th>
  												<th>Total</th>
  												<th>Status</th>
  											</tr>
  										</thead>
  										<tbody>
  											<tr>
  												<td>{{$order_details->name}}</a></td>
  												<td>{{$order_details->quantity}}</td>
  												<td>{{$order_details->total}}</td>
  												<td><span class="label label-success">{{$order_details->STATUS}}</span></td>
  											</tr>
  										</tbody>
  									</table>
                    @if($order_details->STATUS == 'Processing' || $order_details->STATUS == 'Pending')
										<form class="form-horizontal" method="post" action="{{url('postImei/' . $order_details->order_id)}}">
	                    <div class="input-group">
	                      <input type="text" id="imei" name="imei" class="form-control" placeholder="Enter item IMEI number...">
												{{csrf_field()}}
	                      <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
	                    </div>
										</form>
                    @else
                      <p>This order is <span class="label label-danger">{{$order_details->STATUS}}</span></p>
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
