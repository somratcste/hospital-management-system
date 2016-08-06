<div class="app layout-boxed">

    <!-- sidebar panel -->
    <div class="sidebar-panel offscreen-left">

      <div class="brand">

        <!-- logo -->
        <div class="brand-logo">
          <a href="{{ route('admin.index') }}"><h6>Trust One Hospital</h6></a>
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
            <a href="">
              <i class="fa fa-flask"></i>
              <span>Dashboard</span>
            </a>

            <ul class="sub-menu">
              <li>
                <a href="{{ route('admin.index') }}">
                  <i class="toggle-accordion"></i>
                  <span>Home</span>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /dashboard -->

          <!-- patient -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Patient</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="ui-buttons.html">
                  <span>OUt Patient</span>
                </a>
              </li>
              <li>
                <a href="ui-general.html">
                  <span>In Patient</span>
                </a>
              </li>
             </ul>
            </li>
          <!-- /patient -->

          <!-- employee -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-tint"></i>
              <span>Employee</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="#">
                  <span>Doctor</span>
                </a>
                  <ul class="sub-menu">
                    <li>
                      <a href="{{ route('doctor.index') }}">
                        <i class="toggle-accordion"></i>
                        <span>Add New</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('doctor.list') }}">
                        <i class="toggle-accordion"></i>
                        <span>Doctor List</span>
                      </a>
                    </li>
                  </ul>
              </li>
              <li>
                <a href="ui-general.html">
                  <span>Nurse</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="{{ route('nurse.index') }}">
                      <i class="toggle-accordion"></i>
                      <span>Add New</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('nurse.list') }}">
                      <i class="toggle-accordion"></i>
                      <span>Nurse List</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="ui-general.html">
                  <span>Lab. Staff</span>
                </a>
              </li>
              <li>
                <a href="ui-general.html">
                  <span>Accountant</span>
                </a>
              </li>
              <li>
                <a href="ui-general.html">
                  <span>Staff</span>
                </a>
              </li>
             </ul>
            </li>
          <!-- /employee -->

          <!-- Appoinment -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-tag"></i>
              <span>Appoinment</span>
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
            </ul>
          </li>
          <!-- /Appoinment -->

          <!-- Services -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-pie-chart"></i>
              <span>Service</span>
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
            </ul>
          </li>
          <!-- /service -->

          <!-- Report -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-map-marker"></i>
              <span>Report</span>
              {{-- <span class="label label-success pull-right">2</span> --}}
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
          <!-- /Report -->

          <!-- Operation -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-send"></i>
              <span>Operation</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="app-calendar.html">
                  <span>Calendar</span>
                </a>
              </li>
         
            </ul>
          </li>
          <!-- /Operation -->

          <!-- Invoice -->
          <li>
            <a href="widgets.html">
              <i class="fa fa-toggle-on"></i>
              <span>Invoice</span>
            </a>
          </li>
          <!-- /Invoice -->

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
        </ul>
      </nav>
      <!-- /main navigation -->

    </div>
    <!-- /sidebar panel -->