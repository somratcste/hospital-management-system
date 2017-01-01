<div class="app layout-boxed">

    <!-- sidebar panel -->
    <div class="sidebar-panel offscreen-left">

      <div class="brand">

        <!-- logo -->
        <div class="brand-logo">
          <a href="{{ route('admin.index') }}"><h6>Central Hospital</h6></a>
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
                <a href="{{ url('/logout') }}">
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /dashboard -->

          @if(Auth::user()->outdoor_id == 1)
          <!--Outdoor patient -->         
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Outdoor Patient</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('patientout.index') }}">
                  <span>Add Patient</span>
                </a>
              </li>
              <li>
                <a href="{{ route('invoiceout.create')}}">
                  <span>DUE List</span>
                </a>
              </li>
              <li>
                <a href="{{ route('invoiceout.paidlist')}}">
                  <span>PAID List</span>
                </a>
              </li>
              @endif
              @if(Auth::user()->refund_id == 1)
              <li>
                <a href="{{ route('refund.index')}}">
                  <span>Refund List</span>
                </a>
              </li>
              @endif
              @if(Auth::user()->outdoor_id == 1)
              <li>
                <a href="{{ route('report.index') }}">
                  <span>Indoor Test</span>
                </a>
              </li>
              <li>
                <a href="{{ route('report.create') }}">
                  <span>Indoor Test List</span>
                </a>
              </li>
             </ul>
            </li>
            <!-- End Outdoor Patient -- > 
            @endif

            @if(Auth::user()->rf_id==1)
            <!--R.F -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>R.F.</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('searchrf.index') }}">
                  <span>Search V. Doctor</span>
                </a>
              </li>
              <li>
                <a href="{{ route('searchrf.create') }}">
                  <span>Search M. Officer</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- End R.F -->
          @endif


          @if(Auth::user()->indoor_id == 1)
          <!--Indoor patient -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Admit Patient</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('patient.index') }}">
                  <span>Add Patient</span>
                </a>
              </li>
              <li>
                <a href="{{ route('patient.list') }}">
                  <span>Patient List</span>
                </a>
              </li>
             </ul>
            </li>
          <!-- End Indoor Patient-->

          <!-- employee -->
          <!-- @if(Auth::user()->employee_id ==1)
          <li>
            <a href="javascript:;">
              <i class="fa fa-tint"></i>
              <span>Employee</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('employee.index') }}">
                  <span>Add Employee</span>
                </a>
              </li>
              <li>
                <a href="{{ route('ecategory.index')}}">
                  <span>Employee Category</span>
                </a>
              </li>
              <li>
                <a href="{{ route('employee.list') }}">
                  <span>Employee List</span>
                </a>
              </li>   
             </ul>
            </li>
            @endif -->
          <!-- /employee -->

          <!-- Appoinment -->
          
          <!-- /Appoinment -->

          <!-- Operation -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Operation</span>
            </a>
            <ul class="sub-menu">
          
              <li>
                <a href="{{ route('operation.index') }}">
                  <span>Add Operation</span>
                </a>
              </li>
              <li>
                <a href="{{ route('operation.create') }}">
                  <span>Operation List</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /Operation -->

          <!-- Invoice -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Invoice</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('invoice.create_invoce') }}">
                  <span>Creat Invoice</span>
                </a>
              </li>            
              <li>
                <a href="{{ route('invoice.index')}}">
                  <span>Invoice List</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /Invoice -->
          @endif

          @if(Auth::user()->accounce_id == 1)
          <!--Accounce start-->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Accounce</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('accounce_cost.index')}}">
                  <span>A/C Cost</span>
                </a>
              </li>            
            </ul>
          </li>
          <!--End Accounce-->
          @endif
     
          @if(Auth::user()->stock_id == 1)
          <!--stock start-->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Stock</span>
            </a>
            <ul class="sub-menu">          
              <li>
                <a href="{{ route('stock.create')}}">
                  <span>Stock Process</span>
                </a>
              </li>
            </ul>
          </li>
          <!--End Stock -->
          @endif
     
          @if(Auth::user()->super_id == 1)
          <!--Create User -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Create User</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('user.index') }}">
                  <span>Register User</span>
                </a>
              </li>            
              <li>
                <a href="{{ route('user.create')}}">
                  <span>User List</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- End User -->
          
          <!-- Start Pharmacy section -->
          <li>
            <a href="http://localhost/pharmacy/index.php" target="_blank">
              <i class="fa fa-toggle-on"></i>
              <span>Pharmacy Section</span>
            </a>
          </li>
          <!--End  Pharmacy Section -->
          @endif

          @if(Auth::user()->data_entry_id == 1)
          <!-- Data Entry start -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Data Entry</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="javascript:;">
                  <!-- <i class="fa fa-toggle-on"></i> -->
                  <span>R.F.</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="{{ route('marketing.index')}}">
                      <i class="fa fa-map-marker"></i>
                      <span>Marketing Officer</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('village.index') }}">
                      <i class="fa fa-map-marker"></i>
                      <span>Village Doctor</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="javascript:;">
                  <!-- <i class="fa fa-toggle-on"></i> -->
                  <span>Doctor</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="{{ route('doctor.index') }}">
                      <i class="fa fa-map-marker"></i>
                      <span>Doctor</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('specialist.index') }}">
                      <i class="fa fa-map-marker"></i>
                      <span>Specialist</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="javascript:;">
                  <!-- <i class="fa fa-toggle-on"></i> -->
                  <span>Seat</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="{{ route('seat.index') }}">
                      <i class="fa fa-map-marker"></i>
                      <span>Add New</span>
                    </a>
                  </li>
                  @for($i=1;$i<=5;$i++)
                  <li>
                    <a href="{{ route('seat.list' , ['seat' => $i ]) }}">
                      <i class="fa fa-map-marker"></i>
                      <span><?php if($i==1) echo '1st Floor' ;
                                  else if($i==2) echo '2nd Floor';
                                  else if ($i==3) echo '3rd Floor';
                                  else if ($i==4) echo '4th Floor';
                                  else if ($i==5) echo '5th Floor';
                            ?></span>
                    </a>
                  </li>
                  @endfor
                </ul>
              </li>
              <li>
                <a href="javascript:;">
                  <!-- <i class="fa fa-toggle-on"></i> -->
                  <span>Test</span>
                </a>
             
                <ul class="sub-menu">             
                  <li>
                    <a href="{{ route('reportType.index') }}">
                      <i class="fa fa-map-marker"></i>
                      <span>New Type</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('reportType.list') }}">
                    <i class="fa fa-map-marker"></i>
                      <span>Type List</span>
                    </a>
                  </li>
                 
                </ul>
              </li>
               <li>
                  <a href="javascript:;">
                    <!-- <i class="fa fa-toggle-on"></i> -->
                    <span>Operation</span>
                  </a>
                  <ul class="sub-menu">                      
                    <li>
                      <a href="{{ route('operationType.index') }}">
                        <i class="fa fa-map-marker"></i>
                        <span>O.T Type</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('operationType.list') }}">
                        <i class="fa fa-map-marker"></i>
                        <span>O.T List</span>
                      </a>
                    </li>

                  </ul>
                </li> 
                <li>
                  <a href="javascript:;">
                    <!-- <i class="fa fa-toggle-on"></i> -->
                    <span>Stock</span>
                  </a>
                  <ul class="sub-menu">           
                    <li>
                      <a href="{{ route('stock.index')}}">
                        <i class="fa fa-map-marker"></i>
                        <span>Stock Item</span>
                      </a>
                    </li>
                  </ul>
                </li>
            </ul>
          </li>
          <!-- End Data  Entry -->
          @endif

          <!-- menu levels -->
          <!-- <li>
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
          </li> -->
          <!-- menu levels -->
        </ul>
      </nav>
      <!-- /main navigation -->

    </div>
    <!-- /sidebar panel -->