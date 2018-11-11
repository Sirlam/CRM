@extends('layout.front.master')
@section('title')
Redeem Token
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
                    <h3 class="panel-title">Redeem Token</h3>
                    @if (Session::has('success'))
      				          <span class="help-block text-success"> {{ Session::get('success') }}</span>
                    @elseif (Session::has('fail'))
      				          <span class="help-block text-danger"> {{ Session::get('fail') }}</span>
                    @endif
                </div>
                <div class="clearfix"></div>
                <div class="panel-body">
                    <!--Search Row-->
                    <form class="form-horizontal" role="form" action="{{route('postRedemToken')}}" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <div class="col-md-4">
                              Order ID
                            </div>
                            <div class="col-md-8">
                              <input type="text" class="form-control" id="order_id" name="order_id">
                              @if($errors->has('order_id'))
              				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('order_id')}}</span>
                              @endif
                            </div>
                          </div>
                        </div>

                        <div class="col-md-7">
                          <div class="form-group">
                            <div class="col-md-4">
                              Phone
                            </div>
                            <div class="col-md-8">
                              <input type="text" class="form-control" id="telephone" name="telephone">
                              @if($errors->has('telephone'))
              				            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('telephone')}}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-7 col-md-offset-5">
                          {{csrf_field()}}
                          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                        </div>
                      </div>
                    </form>
                    <!--Search Row-->
                    <!--ROW-->
                    <div class="row">
          						<div class="col-md-12">
          							<!-- RECENT PURCHASES -->
                        @if(session()->get('email'))
                        <form action="sendMail" method="post" enctype="multipart/form-data">
                          <input class="form-control hidden" id="email" name="email" value="{{ session()->get( 'email' ) }}">
                          <input class="form-control hidden" id="token" name="token" value="{{ session()->get( 'token' ) }}">
                          {{csrf_field()}}
                          <p>Send token to: <b>{{ session()->get( 'email' ) }}</b> <button type="submit" class="btn btn-danger"><i class="fa fa-envelope"></i> Send</button></p>
                        </form>
                        @endif
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
