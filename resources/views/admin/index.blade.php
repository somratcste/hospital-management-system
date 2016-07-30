@extends('layouts.master')

@section('content')
<!-- quick launch panel -->
  <div class="quick-launch-panel">
    <div class="container">
      <div class="quick-launcher-inner">
        <a href="javascript:;" class="close" data-toggle="quick-launch-panel">×</a>
        <div class="css-table-xs">
          <div class="col">
            <a href="app-calendar.html">
              <i class="icon-marquee"></i>
              <span>Calendar</span>
            </a>
          </div>
          <div class="col">
            <a href="app-gallery.html">
              <i class="icon-drop"></i>
              <span>Gallery</span>
            </a>
          </div>
          <div class="col">
            <a href="app-messages.html">
              <i class="icon-mail"></i>
              <span>Messages</span>
            </a>
          </div>
          <div class="col">
            <a href="app-social.html">
              <i class="icon-speech-bubble"></i>
              <span>Social</span>
            </a>
          </div>
          <div class="col">
            <a href="charts-flot.html">
              <i class="icon-pie-graph"></i>
              <span>Analytics</span>
            </a>
          </div>
          <div class="col">
            <a href="javascript:;">
              <i class="icon-esc"></i>
              <span>Documentation</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /quick launch panel -->

  <div class="app layout-boxed">

    <!-- sidebar panel -->
    <div class="sidebar-panel offscreen-left">

      <div class="brand">

        <!-- logo -->
        <div class="brand-logo">
          <img src="images/logo.png" height="15" alt="">
        </div>
        <!-- /logo -->

        <!-- toggle small sidebar menu -->
        <a href="javascript:;" class="toggle-sidebar hidden-xs hamburger-icon" data-toggle="layout-small-menu">
          <span></span>
  	      <span></span>
  	      <span></span>
  	      <span></span>
        </a>
        <!-- /toggle small sidebar menu -->

      </div>

      <!-- main navigation -->
      <nav role="navigation" >

        <ul class="nav">

          <!-- dashboard -->
    
          <li>
            <a href="index.html">
              <i class="fa fa-flask"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <!-- /dashboard -->

          <!-- ui -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>UI Elements</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="ui-buttons.html">
                  <span>Buttons</span>
                </a>
              </li>
              <li>
                <a href="ui-general.html">
                  <span>General</span>
                </a>
              </li>
              <li>
                <a href="ui-tabs-accordion.html">
                  <span>Tabs &amp; Accordions</span>
                </a>
              </li>
              <li>
                <a href="ui-progressbars.html">
                  <span>Progress Bars</span>
                </a>
              </li>
              <li>
                <a href="ui-pagination.html">
                  <span>Pagination</span>
                </a>
              </li>
              <li>
                <a href="ui-sliders.html">
                  <span>Sliders</span>
                </a>
              </li>
              <li>
                <a href="ui-portlets.html">
                  <span>Portlets</span>
                </a>
              </li>
              <li>
                <a href="ui-notifications.html">
                  <span>Notifications</span>
                </a>
              </li>
              <li>
                <a href="ui-alert.html">
                  <span>Alerts</span>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <i class="toggle-accordion"></i>
                  <span>Icons</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="ui-fontawesome.html">
                      <span>Fontawesome</span>
                    </a>
                  </li>
                  <li>
                    <a href="ui-feather.html">
                      <span>Feather</span>
                    </a>
                  </li>
                  <li>
                    <a href="ui-climacon.html">
                      <span>Climacon</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- /ui -->

          <!-- forms -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-tint"></i>
              <span>Forms</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="form-basic.html">
                  <span>Basic Forms</span>
                </a>
              </li>
              <li>
                <a href="form-advanced.html">
                  <span>Advanced Components</span>
                </a>
              </li>
              <li>
                <a href="form-wizard.html">
                  <span>Wizard</span>
                </a>
              </li>
              <li>
                <a href="form-editors.html">
                  <span>Editors</span>
                </a>
              </li>
              <li>
                <a href="form-validation.html">
                  <span>Validation</span>
                </a>
              </li>
              <li>
                <a href="form-masks.html">
                  <span>Input Masks</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /forms -->

          <!-- tables -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-tag"></i>
              <span>Tables</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="table-basic.html">
                  <span>Basic Tables</span>
                </a>
              </li>
              <li>
                <a href="table-responsive.html">
                  <span>Responsive Table</span>
                </a>
              </li>
              <li>
                <a href="table-datatable.html">
                  <span>Data Tables</span>
                </a>
              </li>
              <li>
                <a href="table-editable.html">
                  <span>Editable Table</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /tables -->

          <!-- charts -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-pie-chart"></i>
              <span>Charts</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="charts-flot.html">
                  <span>Flot Charts</span>
                </a>
              </li>
              <li>
                <a href="charts-easypie.html">
                  <span>EasyPie</span>
                </a>
              </li>

              <li>
                <a href="charts-chartjs.html">
                  <span>ChartJs</span>
                </a>
              </li>
              <li>
                <a href="charts-rickshaw.html">
                  <span>Rickshaw</span>
                </a>
              </li>
              <li>
                <a href="charts-nvd3.html">
                  <span>Nvd3</span>
                </a>
              </li>
              <li>
                <a href="charts-c3.html">
                  <span>C3js</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /charts -->

          <!-- maps -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-map-marker"></i>
              <span>Maps</span>
              <span class="label label-success pull-right">2</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="map-google.html">
                  <span>Google Maps</span>
                </a>
              </li>
              <li>
                <a href="map-vector.html">
                  <span>Vector Maps</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /maps -->

          <!-- ready pages -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-send"></i>
              <span>Apps</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="app-calendar.html">
                  <span>Calendar</span>
                </a>
              </li>
              <li>
                <a href="app-gallery.html">
                  <span>Gallery</span>
                </a>
              </li>
              <li>
                <a href="app-messages.html">
                  <span>Messages</span>
                </a>
              </li>
              <li>
                <a href="app-social.html">
                  <span>Social</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /ready pages -->

          <!-- extras -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-trophy"></i>
              <span>Extras</span>
              <span class="label label-danger pull-right">new</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="extras-invoice.html">
                  <span>Invoice</span>
                </a>
              </li>
              <li>
                <a href="extras-timeline.html">
                  <span>Timeline</span>
                </a>
              </li>
              <li>
                <a href="extras-sortable.html">
                  <span>Sortable Lists</span>
                </a>
              </li>
              <li>
                <a href="extras-nestable.html">
                  <span>Nestable Lists</span>
                </a>
              </li>
              <li>
                <a href="extras-search.html">
                  <span>Search</span>
                </a>
              </li>
              <li>
                <a href="extras-signin.html">
                  <span>Signin</span>
                </a>
              </li>
              <li>
                <a href="extras-signup.html">
                  <span>Signup</span>
                </a>
              </li>
              <li>
                <a href="extras-forgot.html">
                  <span>Forgot Password</span>
                </a>
              </li>
              <li>
                <a href="extras-lockscreen.html">
                  <span>Lockscreen</span>
                </a>
              </li>
              <li>
                <a href="extras-404.html">
                  <span>404 Page</span>
                </a>
              </li>
              <li>
                <a href="extras-500.html">
                  <span>500 Page</span>
                </a>
              </li>
              <li>
                <a href="extras-blank.html">
                  <span>Starter Page</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /extras -->

          <!-- ui kit -->
          <li>
            <a href="widgets.html">
              <i class="fa fa-toggle-on"></i>
              <span>Widgets</span>
            </a>
          </li>
          <!-- /ui kit -->

          <!-- menu levels -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-level-down"></i>
              <span>Menu Levels</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="javascript:;">
                  <i class="toggle-accordion"></i>
                  <span>Level 1.1</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="javascript:;">
                      <i class="toggle-accordion"></i>
                      <span>Level 2.1</span>
                    </a>
                    <ul class="sub-menu">
                      <li>
                        <a href="javascript:;">
                          <span>Level 3.1</span>
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;">
                          <span>Level 3.2</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span>Level 2.2</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="javascript:;">
                  <span>Level 1.2</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- menu levels -->

          <!-- emails -->
          <li data-ng-class="{open: $state.includes('app.extras')}">
            <a href="javascript:;">
              <i class="fa fa-envelope"></i>
              <span>Transational Emails</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="http://urban.nyasha.me/email/action.html" target="_blank">
                  <span>Action</span>
                </a>
              </li>
              <li>
                <a href="http://urban.nyasha.me/email/alert.html" target="_blank">
                  <span>Alert</span>
                </a>
              </li>
              <li>
                <a href="http://urban.nyasha.me/email/billing.html" target="_blank">
                  <span>Billing</span>
                </a>
              </li>
              <li>
                <a href="http://urban.nyasha.me/email/progress.html" target="_blank">
                  <span>Progress</span>
                </a>
              </li>
              <li>
                <a href="http://urban.nyasha.me/email/survey.html" target="_blank">
                  <span>Survey</span>
                </a>
              </li>
              <li>
                <a href="http://urban.nyasha.me/email/welcome.html" target="_blank">
                  <span>Welcome</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /emails -->

          <!-- customizer -->
          <li>
            <a href="http://customizer.nyasha.me/#urban" target="_blank">
              <i class="fa fa-sliders"></i>
              <span>Customizer</span>
              <span class="label label-danger pull-right">hot</span>
            </a>
          </li>
          <!-- /customizer -->

          <!-- documentation -->
          <li>
            <a href="docs.html">
              <i class="fa fa-folder"></i>
              <span>Documentation</span>
            </a>
          </li>
          <!-- /documentation -->

          <!-- angular -->
          <li>
            <a href="http://urban.nyasha.me/angular">
              <i class="fa fa-circle"></i>
              <span>Angular Version</span>
            </a>
          </li>
          <!-- /angular -->

        </ul>
      </nav>
      <!-- /main navigation -->

    </div>
    <!-- /sidebar panel -->

    <!-- content panel -->
    <div class="main-panel">

      <!-- top header -->
      <header class="header navbar">

        <div class="brand visible-xs">
          <!-- toggle offscreen menu -->
          <div class="toggle-offscreen">
            <a href="#" class="hamburger-icon visible-xs" data-toggle="offscreen" data-move="ltr">
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

          <!-- toggle chat sidebar small screen-->
          <div class="toggle-chat">
            <a href="javascript:;" class="hamburger-icon v2 visible-xs" data-toggle="layout-chat-open">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
          <!-- /toggle chat sidebar small screen-->
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
            <a href="javascript:;" data-toggle="quick-launch-panel">
              <i class="fa fa-circle-thin"></i>
            </a>
          </li>

          <li>
            <a href="javascript:;" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <div class="status bg-danger border-danger animated bounce"></div>
            </a>
            <ul class="dropdown-menu notifications">
              <li class="notifications-header">
                <p class="text-muted small">You have 3 new messages</p>
              </li>
              <li>
                <ul class="notifications-list">
                  <li>
                    <a href="javascript:;">
                      <span class="pull-left mt2 mr15">
                                                <img src="images/avatar.jpg" class="avatar avatar-xs img-circle" alt="">
                                            </span>
                      <div class="overflow-hidden">
                        <span>Sean launched a new application</span>
                        <span class="time">2 seconds ago</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <div class="pull-left mt2 mr15">
                        <div class="circle-icon bg-danger">
                          <i class="fa fa-chain-broken"></i>
                        </div>
                      </div>
                      <div class="overflow-hidden">
                        <span>Removed chrome from app list</span>
                        <span class="time">4 Hours ago</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span class="pull-left mt2 mr15">
                                                <img src="images/face3.jpg" class="avatar avatar-xs img-circle" alt="">
                                            </span>
                      <div class="overflow-hidden">
                        <span class="text-muted">Jack Hunt has registered</span>
                        <span class="time">9 hours ago</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="notifications-footer">
                <a href="javascript:;">See all messages</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:;" data-toggle="dropdown">
              <img src="images/avatar.jpg" class="header-avatar img-circle ml10" alt="user" title="user">
              <span class="pull-left">Samuel Perkins</span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="javascript:;">Settings</a>
              </li>
              <li>
                <a href="javascript:;">Upgrade</a>
              </li>
              <li>
                <a href="javascript:;">
                  <span class="label bg-danger pull-right">34</span>
                  <span>Notifications</span>
                </a>
              </li>
              <li>
                <a href="javascript:;">Help</a>
              </li>
              <li>
                <a href="signin.html">Logout</a>
              </li>
            </ul>

          </li>

          <li>
            <a href="javascript:;" class="hamburger-icon v2" data-toggle="layout-chat-open">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </li>
        </ul>
      </header>
      <!-- /top header -->

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