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
                    <h3 class="panel-title">Dashboard</h3>
                    @if (Session::has('success'))
        								<span class="help-block text-success"> {{ Session::get('success') }}</span>
        						@elseif (Session::has('fail'))
        								<span class="help-block text-danger"> {{ Session::get('fail') }}</span>
        						@endif
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
                      <!-- MULTI CHARTS -->
          						<div class="col-md-6">
          							<div class="panel">
          								<div class="panel-heading">
          									<h3 class="panel-title">Redeemed Orders Trend</h3>
          									<div class="right">
          										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
          										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
          									</div>
          								</div>
          								<div class="panel-body">
          									<div id="visits-trends-chart" class="ct-chart"></div>
          								</div>
          							</div>
          							<!--END MULTI CHARTS -->
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
