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
        Trust One Hospital
      </div>
      <!-- /logo -->
    </div>

    <ul class="nav navbar-nav hidden-xs">
      <li>
        <p class="navbar-text">
          Daily Entry information
        </p>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right hidden-xs">

      <li>
        <a href="javascript:;" data-toggle="dropdown">
          <img src="{{ asset('images/avatar.jpg') }}" class="header-avatar img-circle ml10" alt="user" title="user">
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
    <div class="panel mb25">
        <div class="panel-heading border">
          Admin Patient
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Time</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Time</th>
            </tr>          
            </tfoot>
          <tbody>
            <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>                 
            </tr>
             <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>                 
            </tr>
             <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>                 
            </tr>
             <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>                 
            </tr>
             <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>                 
            </tr>
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--Admit Patient Section End-->

  <!--Start Due Report Section-->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Due Report List
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>Paid Amount</th>
              <th>Due Amount</th>
              <th>Time</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>Paid Amount</th>
              <th>Due Amount</th>
              <th>Time</th>
            </tr>         
            </tfoot>
          <tbody>
            <tr>
              <td>01</td>         
              <td>15</td>         
              <td>2500 Tk.</td>         
              <td>500 Tk.</td>
              <td>2000 Tk.</td> 
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>01</td>         
              <td>15</td>         
              <td>2500 Tk.</td>         
              <td>500 Tk.</td>
              <td>2000 Tk.</td> 
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>01</td>         
              <td>15</td>         
              <td>2500 Tk.</td>         
              <td>500 Tk.</td>
              <td>2000 Tk.</td> 
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>01</td>         
              <td>15</td>         
              <td>2500 Tk.</td>         
              <td>500 Tk.</td>
              <td>2000 Tk.</td> 
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>01</td>         
              <td>15</td>         
              <td>2500 Tk.</td>         
              <td>500 Tk.</td>
              <td>2000 Tk.</td> 
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td></td>         
              <td></td>         
              <td>50000 Tk.</td>         
              <td>20000 Tk.</td>
              <td>30000 Tk.</td> 
              <td></td>                
            </tr>
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--end due report list-->

  <!--start paid report list-->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Paid Report List
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>Time</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>Time</th>
            </tr>         
            </tfoot>
          <tbody>
            <tr>
              <td>05</td>         
              <td>15</td>         
              <td>2500 Tk.</td>
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>05</td>         
              <td>15</td>         
              <td>2500 Tk.</td>
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>05</td>         
              <td>15</td>         
              <td>2500 Tk.</td>
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>05</td>         
              <td>15</td>         
              <td>2500 Tk.</td>
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>05</td>         
              <td>15</td>         
              <td>2500 Tk.</td>
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td></td>         
              <td></td>         
              <td>25000 Tk.</td>
              <td></td>                
            </tr>
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--end paid report list-->
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection