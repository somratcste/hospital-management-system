@extends('layouts.master')

@section('top_header')
<!-- content panel -->
<div class="main-panel">
  <!-- top header -->
  <header class="header navbar">

    <div class="brand visible-xs">
      <!-- toggle offscreen menu -->
      <div class="toggle-offscreen">
        <a href="#" class="hamburger-icon v2 visible-xs" data-toggle="offscreen" data-move="ltr">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
      <!-- /toggle offscreen menu -->

      <!-- logo -->
      <div class="brand-logo">
        <img src="images/logo-dark.png" height="15" alt="">
      </div>
      <!-- /logo -->
    </div>

    <ul class="nav navbar-nav hidden-xs">
      <li>
        <p class="navbar-text">
          Dashboard
        </p>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right hidden-xs">

      <li>
        <a href="javascript:;" data-toggle="dropdown">
          <img src="images/avatar.jpg" class="header-avatar img-circle ml10" alt="user" title="user">
          <span class="pull-left">Trust One Hospital</span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="{{ route('admin.index') }}">Dashboard</a>
          </li>
          <li>
            <a href="signin.html">Logout</a>
          </li>
        </ul>

      </li>

    </ul>
  </header>
  <!-- /top header -->
@endsection


@section('content')

      <!-- main area -->
      <div class="main-content">
        <div class="row">
          <div class="col-md-3">
            <div>
              <div class="widget bg-white">
                <div class="widget-icon bg-blue pull-left fa fa-microphone">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">8,372K</span>
                  <span class="widget-subtitle">Registered users</span>
                </div>
              </div>
              <div class="widget bg-white">
                <div class="widget-icon bg-danger pull-left fa fa-tint">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title percent">86</span>
                  <span class="widget-subtitle">Revenue increase</span>
                </div>
              </div>
              <div class="widget bg-white">
                <div class="widget-icon bg-success pull-left fa fa-paper-plane">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">7,355K</span>
                  <span class="widget-subtitle">Pending orders</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="widget-chart bg-white no-padding">
              <div class="row absolute tp lt rt p15">
                <div class="col-xs-12">
                  <div class="pull-right">
                    <i class="fa fa-square text-primary mr5"></i> Mail Server
                  </div>
                  <small class="text-uppercase">Transfer speeds</small>
                  <h4 class="text-primary bold no-margin">43.02mbps</h4>
                </div>
              </div>
              <div class="rickshaw_graph">
                <div id="dashboard-rickshaw" style="height:250px"></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget-chart bg-white">

              <div class="row">
                <div class="col-xs-12">
                  <small class="text-uppercase">Weekly distribution</small>
                  <h4 class="no-margin bold text-success">3,490K</h4>
                </div>
              </div>
              <div class="canvas-holder mt5 mb5">
                <div class="flot-pie chart-sm" style="height:171px;"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="widget widget-weather bg-white">
              <div class="widget-weather-icon climacon wind cloud sun"></div>
              <div class="mb15">
                <strong>San Francisco, CA</strong>
              </div>
              <div class="widget-weather-footer">
                <div>
                  <div class="small">MON</div>
                  <div class="climacon drizzle sun text-warning"></div>
                  <div class="degree-value">45&#176;</div>
                </div>
                <div>
                  <div class="small">TUE</div>
                  <div class="climacon snow sun text-danger"></div>
                  <div class="degree-value">42&#176;</div>
                </div>
                <div>
                  <div class="small">WED</div>
                  <div class="climacon haze sun text-info"></div>
                  <div class="degree-value">37&#176;</div>
                </div>
                <div>
                  <div class="small">THU</div>
                  <div class="climacon hail text-primary"></div>
                  <div class="degree-value">23&#176;</div>
                </div>
                <div>
                  <div class="small">FRI</div>
                  <div class="climacon fog moon"></div>
                  <div class="degree-value">34&#176;</div>
                </div>
                <div>
                  <div class="small">SAT</div>
                  <div class="climacon tornado text-success"></div>
                  <div class="degree-value">12&#176;</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="widget bg-white">
              <h3 class="text-info mt0 mb0 bold">56780</h3>
              <div class="small text-uppercase">Recent Activities</div>
              <small class="pt5">Donec ullamcorper nulla non metus auctor.</small>
            </div>
            <div class="widget-chart bg-white no-padding">
              <div class="absolute tp lt rt p15">
                <h3 class="mb0 mt0 bold">7,623K</h3>
                <div class="small text-uppercase">Daily income</div>
              </div>
              <div class="absolute tp rt pt15 pr15">
                <div class="text-success">
                  <i class="fa fa-caret-up"></i>
                  <span>6%</span>
                </div>
                <div class="small">+897</div>
              </div>
              <div class="rickshaw_graph">
                <div id="dashboard-rickshaw2" style="height:133px;"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="widget bg-white">
              <div class="text-center">
                <h6 class="text-uppercase">Page Views</h6>
                <div class="mt15">
                  <h1 class="text-primary">512k+</h1>
                  <div class="flot-line chart-sm" style="height:123px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="widget bg-white">
              <div class="widget-details widget-list">
                <div class="mb20">
                  <h4 class="no-margin text-uppercase">Sales</h4>
                  <small class="text-uppercase">Weekly projections</small>
                </div>
                <a href="javascript:;" class="widget-list-item">
                  <span class="label label-info pull-right">32</span> United States
                </a>
                <a href="javascript:;" class="widget-list-item">
                  <span class="label label-danger pull-right">54</span> China
                </a>

                <a href="javascript:;" class="widget-list-item">
                  <span class="label label-warning pull-right">45</span> Great Britain
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="widget bg-primary">
              <div class="widget-bg-icon">
                <i class="fa fa-bookmark-o"></i>
              </div>
              <div class="widget-details">
                <h4 class="no-margin">4,894K</h4>
                <span>Parks and recreation</span>
              </div>
            </div>
            <div class="widget bg-white">

              <div class="row">
                <div class="col-xs-4">
                  <h6>
                                      Distance travelled
                                  </h6>
                  <h1 class="mt0 mb0 bold">
                                      4389km
                                  </h1>
                  <small class="mb0">
                                      Avg 56km/Sec
                                  </small>
                </div>
                <div class="col-xs-8">
                  <div class="canvas-holder">
                    <div class="flot-bars chart" style="height:90px;"></div>
                  </div>
                </div>
              </div>

            </div>


          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                <a href="javascript:;" class="pull-left relative">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
                </a>
              </div>
              <div class="widget-details">
                <span class="h5 bold">Samuel Perkins</span>
                <small class="block">San Francisco, CA</small>
                <small class="block">Interactive UX Developer</small>
              </div>
            </section>
          </div>
          <div class="col-md-4">
            <section class="widget bg-brown text-center">
              <div class="widget-details">
                <h2 class="no-margin bold">14&#176;C</h2>
                <small class="text-uppercase">San Francisco, CA</small>
              </div>
              <div class="widget-details">
                <div class="climacon hail sun fa-4x"></div>
              </div>
            </section>
          </div>
          <div class="col-md-4">
            <section class="widget bg-success text-center">
              <div class="widget-details col-xs-4">
                <h2 class="no-margin">132</h2>
                <small class="text-uppercase">Pending</small>
              </div>
              <div class="widget-details col-xs-4">
                <h2 class="no-margin">43</h2>
                <small class="text-uppercase">Completed</small>
              </div>
              <div class="widget-details col-xs-4">
                <h2 class="no-margin">28</h2>
                <small class="text-uppercase">Failed</small>
              </div>
            </section>
          </div>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
@endsection