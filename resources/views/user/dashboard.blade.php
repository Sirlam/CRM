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
                                    <span class="number">{{$customer_count}}</span>
                                    <span class="title">Total Customers</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                <p>
                                    <span class="number">203</span>
                                    <span class="title">Pending Orders</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-money"></i></span>
                                <p>
                                    <span class="number">274,678</span>
                                    <span class="title">Sales</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-check"></i></span>
                                <p>
                                    <span class="number">35%</span>
                                    <span class="title">Total Orders</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END ROW -->
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
