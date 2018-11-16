@extends('layout.front.master')
@section('title')
Dashboard
@endsection

@section('body')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Pending Orders</h3>
                    @if (Session::has('success'))
        								<span class="help-block text-success"> {{ Session::get('success') }}</span>
        						@elseif (Session::has('fail'))
        								<span class="help-block text-danger"> {{ Session::get('fail') }}</span>
        						@endif
                </div>
                <div class="panel-body">

                  <!--Search Row-->
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
                  <!--Search Row-->

                    <!--ROW-->
                    <div class="row">
          						<div class="col-md-12">
          							<!-- RECENT PURCHASES -->
          							<div class="panel">
          								<div class="panel-heading">
          									<!--<h3 class="panel-title">Pending Orders</h3>-->
          									<div class="right">
          										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
          										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
          									</div>
          								</div>
          								<div class="panel-body no-padding fg-scrollabletable">
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
                                @foreach($pending as $pend)
                                <tr>
                                  <td class="col-sm-1">{{$pend->order_id}}</td>
            											<td class="col-sm-2"><a href="{{url('order/'.$pend->order_id)}}">{{$pend->name}}</a></td>
            											<td class="col-sm-1"><a href="{{url('customer/'.$pend->customer_id)}}">{{$pend->firstname}}  {{$pend->lastname}}</td>
            											<td class="col-sm-1">{{$pend->telephone}}</td>
            											<td class="col-sm-1">{{$pend->quantity}}</td>
            											<td class="col-sm-1">{{$pend->currency_code}}{{$pend->total}}</td>
            											<td class="col-sm-2">{{$pend->date_added}}</td>
                                  <td class="col-sm-1">
            												@foreach($order_status as $status)
            													@if($status->order_status_id == $pend->order_status_id)
            														<span class="label label-success">{{$status->name}}</span>
            													@endif
            												@endforeach
            											</td>
                                </tr>
                                @endforeach
          										</tbody>
          									</table>
          								</div>
          								<div class="panel-footer">
          									<div class="row">
          										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Recent</span></div>
          									</div>
          								</div>
          							</div>
          							<!-- END RECENT PURCHASES -->
          						</div>
                      <!-- MULTI CHARTS -->
                      <!--
          						<div class="col-md-6">
          							<div class="panel">
          								<div class="panel-heading">
          									<h3 class="panel-title">Sales Trend</h3>
          									<div class="right">
          										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
          										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
          									</div>
          								</div>
          								<div class="panel-body">
          									<div id="visits-trends-chart" class="ct-chart"></div>
          								</div>
          							</div>
          							<!END MULTI CHARTS -->
          						</div>
          					</div>
                    <!--END ROW-->
                  </div>
                  <!-- END PANEL BODY -->
                </div>
                <!-- END PANEL -->
              </div>
              <!-- END CONTAINER FLUID -->
  </div>
  <!-- END MAIN CONTENT -->
</div>
@stop
