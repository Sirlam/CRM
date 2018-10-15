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
                    <h3 class="panel-title">Daily Overview</h3>
                    <p class="panel-subtitle">{{date('d-M-Y')}}</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-users"></i></span>
                                <p>
                                    <span class="number">{{count($customers)}}</span>
                                    <span class="title">Total Customers</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                <p>
                                    <span class="number">{{count($pending)}}</span>
                                    <span class="title">Pending Orders</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-money"></i></span>
                                <p>
                                    <span class="number">{{$sales->count()}}</span>
                                    <span class="title">Sales</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-check"></i></span>
                                <p>
                                    <span class="number">{{count($orders)}}</span>
                                    <span class="title">Total Orders</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END ROW -->
                    <!--ROW-->
                    <div class="row">
          						<div class="col-md-6">
          							<!-- RECENT PURCHASES -->
          							<div class="panel">
          								<div class="panel-heading">
          									<h3 class="panel-title">Pending Orders</h3>
          									<div class="right">
          										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
          										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
          									</div>
          								</div>
          								<div class="panel-body no-padding">
          									<table class="table table-striped" id="myTable">
          										<thead>
          											<tr>
          												<th>Name</th>
                                  <th>Quantity</td>
          												<th>Amount</th>
          											</tr>
          										</thead>
          										<tbody>
                                @foreach($pending as $pend)
                                <tr>
                                  <td>{{$pend->name}}</td>
                                  <td>{{$pend->quantity}}</td>
                                  <td>{{$pend->total}}</td>
                                </tr>
                                @endforeach
          										</tbody>
          									</table>
          								</div>
          								<div class="panel-footer">
          									<div class="row">
          										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Recent</span></div>
          										<div class="col-md-6 text-right"><a href="{{URL::route('allOrders')}}" class="btn btn-success">View All Orders</a></div>
          									</div>
          								</div>
          							</div>
          							<!-- END RECENT PURCHASES -->
          						</div>
          						<div class="col-md-6">
          							<!-- MULTI CHARTS -->
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
          							<!-- END MULTI CHARTS -->
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
