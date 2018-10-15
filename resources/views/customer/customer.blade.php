@extends('layout.front.master')
@section('title')
{{$customer->firstname . ' ' . $customer->lastname}}
@endsection

@section('body')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-profile">
				<div class="clearfix">
					<!-- LEFT COLUMN -->
					<div class="profile-left">
						<!-- PROFILE HEADER -->
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main">
								<img src="{{URL::asset('img/user-medium.png')}}" class="img-circle" alt="Avatar">
								<h3 class="name">{{$customer->firstname . ' ' . $customer->lastname}}</h3>
								<span class="online-status status-available">Active</span>
							</div>
							<div class="profile-stat">
								<div class="row">
									<div class="col-md-6 stat-item">
										{{count($orders)}} <span>Total Orders</span>
									</div>
									<div class="col-md-6 stat-item">
										- <span>Pending Orders</span>
                  </div>
								</div>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
						<!-- PROFILE DETAIL -->
						<div class="profile-detail">
							<div class="profile-info">
								<h4 class="heading">Basic Info</h4>
								<ul class="list-unstyled list-justify">
									<li>Date Joined <span>{{$customer->date_added}}</span></li>
									<li>Mobile <span>{{$customer->telephone}}</span></li>
									<li>Email <span>{{$customer->email}}</span></li>
									<li>Gender <span>{{$customer->gender}}</li>
								</ul>
							</div>
						</div>
						<!-- END PROFILE DETAIL -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right">
						<!-- TABBED CONTENT -->
						<div class="custom-tabs-line tabs-line-bottom left-aligned">
							<ul class="nav" role="tablist">
                <li class="active"><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Order History <span class="badge">{{count($orders)}}</span></a></li>
								<!--<li><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Recent Activity</a></li>-->
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab-bottom-left2">
								<div class="table-responsive">
									<table class="table project-table" id="myTable">
										<thead>
											<tr>
												<th>Order ID</th>
												<th>Product</th>
												<th>Quantity</th>
												<th>Total</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($orders as $order)
											<tr>
												<td><a href="{{url('order/'.$order->order_id)}}">{{$order->order_id}}</td>
												<td><a href="{{url('order/'.$order->order_id)}}">{{$order->name}}</a></td>
												<td>{{$order->quantity}}</td>
												<td>{{$order->currency_code}} {{$order->total}}</td>
												<td>
												@foreach($order_status as $status)
													@if($status->order_status_id == $order->order_status_id)
														<span class="label label-success">{{$status->name}}</span>
													@endif
												@endforeach
											</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<!--
              <div class="tab-pane fade" id="tab-bottom-left1">
								<ul class="list-unstyled activity-timeline">
									<li>
										<i class="fa fa-comment activity-icon"></i>
										<p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
									</li>
									<li>
										<i class="fa fa-cloud-upload activity-icon"></i>
										<p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
									</li>
									<li>
										<i class="fa fa-plus activity-icon"></i>
										<p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
									</li>
									<li>
										<i class="fa fa-check activity-icon"></i>
										<p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
									</li>
								</ul>
								<div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div>
							</div>-->
						</div>
						<!-- END TABBED CONTENT -->
					</div>
					<!-- END RIGHT COLUMN -->
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@stop
