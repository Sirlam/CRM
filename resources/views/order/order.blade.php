@extends('layout.front.master')
@section('title')
{{$order_details->name}}
@endsection

@section('body')
<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Order</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- BUTTONS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Order</h3>
								</div>
								<div class="panel-body">
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
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter item token...">
                      <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                    </div>
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
