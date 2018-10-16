<!-- WRAPPER -->
<div id="wrapper">
<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="{{URL::route('dashboard')}}"><img src="{{URL::asset('img/logo-dark.png')}}" alt="CRM Logo" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <form class="navbar-form navbar-left">
            <div class="input-group">
                <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                <span class="input-group-btn"><button type="button" class="btn btn-success">Go</button></span>
            </div>
        </form>
        <div class="navbar-btn navbar-btn-right">
            <a class="btn btn-success update-pro" href="#" title="Upgrade to Pro" target="_blank">
              <i class="fa fa-rocket"></i>
              @foreach($locations as $location)
                @if(Auth::user()->location_id == $location->pickup_id)
                  <span>{{$location->name}}</span>
                @endif
              @endforeach
            </a>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                        <i class="lnr lnr-alarm"></i>
                        <span class="badge bg-danger">5</span>
                    </a>
                    <ul class="dropdown-menu notifications">
                        <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                        <li><a href="#" class="more">See all notifications</a></li>
                    </ul>
                </li>
                <!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Basic Use</a></li>
                        <li><a href="#">Working With Data</a></li>
                        <li><a href="#">Security</a></li>
                        <li><a href="#">Troubleshooting</a></li>
                    </ul>
                </li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{URL::asset('img/user.png')}}" class="img-circle" alt="Avatar"> <span>{{Auth::user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                      <!--
                        <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                        <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                        <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>-->
                        <li><a href="{{URL::route('getLogout')}}"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->

<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{URL::route('dashboard')}}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li>
                  <a href="#subPage" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Customers</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPage" class="collapse ">
                      <ul class="nav">
                          <li><a href="{{URL::route('allCustomers')}}" class="">All Customers</a></li>
                      </ul>
                  </div>
                </li>
                <li>
                    <a href="#subPage1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Orders</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPage1" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{URL::route('allOrders')}}" class="">Find an Order</a></li>
                            <li><a href="{{URL::route('sales')}}" class="">Sales</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                  <a href="#" class=""><i class="lnr lnr-dice"></i> <span>Reports & Analytics</span></a>
                </li>
                <li>
                  <a href="#subPage3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Configuration</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPage3" class="collapse">
                      <ul class="nav">
                          <li><a href="{{URL::route('allUsers')}}" class="">Manage Users</a></li>
                          <li><a href="{{URL::route('allRoles')}}" class="">Manage Roles</a></li>
                          <li><a href="{{URL::route('allPermissions')}}" class="">Manage Permissions</a></li>
                      </ul>
                  </div>
                </li>
                <li>
                  <a href="#subPage4" data-toggle="collapse" class="collapsed" class=""><i class="lnr lnr-linearicons"></i> <span>Audit</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPage4" class="collapse ">
                      <ul class="nav">
                          <li><a href="#" class="">Audit Log</a></li>
                      </ul>
                  </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->
