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
          Monthly Delivary information
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
          Monthly Delivary Information
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Date / Time</th>
              <th>Company Name</th>
              <th>Medicine Name</th>
              <th>Piece</th>
              <th>Price</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Date / Time</th>
              <th>Company Name</th>
              <th>Medicine Name</th>
              <th>Piece</th>
              <th>Price</th>
              <th>Subtotal</th>
            </tr>         
            </tfoot>
          <tbody>
            <tr>
              <td>01</td>     
              <td>13-Oct-2016</td>    
              <td>Square</td>         
              <td>Neoceptin R</td>         
              <td>500</td>
              <td>2 Tk.</td>
              <td>1000 Tk.</td>                 
            </tr>
            <tr>
              <td>01</td>     
              <td>13-Oct-2016</td>    
              <td>Square</td>         
              <td>Neoceptin R</td>         
              <td>500</td>
              <td>2 Tk.</td>
              <td>1000 Tk.</td>                 
            </tr><tr>
              <td>01</td>     
              <td>13-Oct-2016</td>    
              <td>Square</td>         
              <td>Neoceptin R</td>         
              <td>500</td>
              <td>2 Tk.</td>
              <td>1000 Tk.</td>                 
            </tr><tr>
              <td>01</td>     
              <td>13-Oct-2016</td>    
              <td>Square</td>         
              <td>Neoceptin R</td>         
              <td>500</td>
              <td>2 Tk.</td>
              <td>1000 Tk.</td>                 
            </tr><tr>
              <td>01</td>     
              <td>13-Oct-2016</td>    
              <td>Square</td>         
              <td>Neoceptin R</td>         
              <td>500</td>
              <td>2 Tk.</td>
              <td>1000 Tk.</td>                 
            </tr>
            <tr>
              <td></td>         
              <td></td>         
              <td></td>         
              <td></td>
              <td></td>
              <td></td>
              <td>2,75,000 Tk.</td>                 
            </tr>
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--Admit Patient Section End-->

  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection