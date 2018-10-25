@extends('layout.front.master')
@section('title')
Report
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
                    <h3 class="panel-title">Pending Orders Report</h3>
                    @if (Session::has('success'))
      				          <span class="help-block text-success"> {{ Session::get('success') }}</span>
                    @elseif (Session::has('fail'))
      				          <span class="help-block text-danger"> {{ Session::get('fail') }}</span>
                    @endif
                    <p class="panel-subtitle pull-right"><a href="#" class="btn btn-danger" id="export"><i class="fa fa-file"></i> Excel Export</a></p>
                </div>
                <div class="clearfix"></div>
                <div class="panel-body">
                    <!--Search Row-->
                    <form class="form-horizontal" role="form">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <div class="col-md-4">
                              Customer Name
                            </div>
                            <div class="col-md-8">
                              <input type="text" class="form-control" id="name" name="name">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-4">
                              Telephone
                            </div>
                            <div class="col-md-8">
                              <input type="text" class="form-control" id="name" name="name">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-4">
                              Location
                            </div>
                            <div class="col-md-8">
                              <select class="form-control" name="location_id" id="location_id">
                                 @foreach($locations as $item)
                                    <option value="{{$item->pickup_id}}">{{$item->name}}</option>
                                 @endforeach
                               </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-7">
                          <div class="form-group">
                            <div class="col-md-4">
                              Date From
                            </div>
                            <div class="col-md-8">
                              <input type="date" class="form-control" id="name" name="name">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-4">
                              Date To
                            </div>
                            <div class="col-md-8">
                              <input type="date" class="form-control" id="name" name="name">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-7 col-md-offset-5">
                          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                        </div>
                      </div>
                    </form>
                    <!--Search Row-->
                    <!--ROW-->
                    <div class="row">
          						<div class="col-md-12">
          							<!-- RECENT PURCHASES -->
          							<div class="panel">
          								<div class="panel-heading">
          									<!--<h3 class="panel-title">Pending Orders</h3>
          									<div class="right">
          										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
          										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
          									</div>-->
          								</div>
          								<div class="panel-body no-padding fg-scrollabletable">
          									<table class="table table-striped" id="reportTable">
          										<thead>
          											<tr>
          												<th class="col-sm-2">Order Id</th>
                                  <th class="col-sm-2">Customer ID</th>
                                  <th class="col-sm-2">Order Date</th>
                                  <th class="col-sm-2">Customer Name</th>
                                  <th class="col-sm-1">Phone</th>
                                  <th class="col-sm-1">Name</th>
                                  <th class="col-sm-1">Quantity</th>
                                  <th class="col-sm-1">Amount</th>
                                  <th class="col-sm-1">Location</th>
          											</tr>
          										</thead>
          										<tbody>

          										</tbody>
          									</table>
          								</div>
          								<div class="panel-footer">
          									<!--<div class="row">
          										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Recent</span></div>
          										<div class="col-md-6 text-right"><a href="{{URL::route('allOrders')}}" class="btn btn-primary">View All Orders</a></div>
          									</div>-->
          								</div>
          							</div>
          							<!-- END RECENT PURCHASES -->
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
