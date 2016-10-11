@extends('layouts.master')

@section('run_custom_css')
<style type="text/css">
  @media print {
    .panel-heading {
      display: none;
    }
    .panel-body {
      margin-bottom: 250px;
    }
  }
</style>
@endsection
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
          View Report Details
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
    	Patient Copy
    </div>

    <div class="">
      <center>
        <h4>TRUST ONE HOSPITAL</h4>
        <p>Maijdee-Court , Noakhali. Hello : 01823387518</p>
        <p>Patient Copy</p>
      </center>
    </div>


    <div class="panel-body">
    <div class="row">

    <div class="col-md-6 pull-left">
      <table class="table table-bordered table-hover">
        <tbody>

            <tr>
              <td>Report ID</td>
              <td>{{ $invoiceout->id }}</td>
            </tr>
            <tr>
              <td>Patient Name</td>
              <td>{{ $invoiceout->patientout->name }}</td>
            </tr>
            <tr>
              <td>Reference Doctor</td>
              <td>{{ $invoiceout->patientout->doctor->name }}</td>
            </tr>
                      
        </tbody>
      </table>
      </div>

      <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>

            <tr>
              <td>Patient ID</td>
              <td>{{ $invoiceout->patientout->id }}</td>
            </tr>
            <tr>
              <td>Patient Mobile</td>
              <td>{{ $invoiceout->patientout->mobile }}</td>
            </tr>
            <tr>
              <td>Patient Address</td>
              <td>{{ $invoiceout->patientout->address }}</td>
            </tr>
          </tbody>
        </table>
        </div>

      </div>

      <div class="row col-md-12">
      <div class="table-responsive">  
     
      <table class="table table-bordered table-hover">
        <thead>
            <tr>
              <th width="50%">Test Name</th>
              <th width="30%">Room No.</th>
              <th width="20%">Price</th>
            </tr>
            </thead>

            <tbody>
              @foreach($invoiceoutproducts as $invoiceoutproduct)
                <tr>
                  <td>{{ $invoiceoutproduct->report_name }}</td>
                  <td>{{ $invoiceoutproduct->report_room }} </td>
                  <td>{{ $invoiceoutproduct->report_cost }} Tk.</td>
               </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
       <div class="col-md-6 pull-left">
        <table class="table table-bordered table-hover">
          <tbody>
            <p style="color: red;text-align: center;font-size: 40px;font-family:initial;padding-top: 130px;">
            @if($invoiceout->due== 0)
              PAID 
            @else
              DUE
            @endif
            </p>
            <p style="padding-top: 80px">Recipent Signature .... .... ... ... ... ... ... ...</p>
          </tbody>
        </table>
        </div>

        <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>
              
              <tr>
                <td width="50%">Subtotal</td>
                <td width="50%">{{ $invoiceout->subtotal }} Tk.</td>
              </tr>
              <tr>
                <td>Percent</td>
                <td>{{ $invoiceout->percent }} Tk.</td>
              </tr>
              <tr>
                <td>Percent Amount</td>
                <td>{{ $invoiceout->percent_amount }} Tk.</td>
              </tr>
              <tr>
                <td>Without Percent</td>
                <td>{{ $invoiceout->without_percent }} Tk.</td>
              </tr>
              <tr>
                <td>Discount Amount</td>
                <td>{{ $invoiceout->discount }} Tk.</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>{{ $invoiceout->total }} Tk.</td>
              </tr>
              <tr>
                <td>Paid</td>
                <td>{{ $invoiceout->receive_cash }} Tk.</td>
              </tr>
              <tr>
                <td>Due Money</td>
                <td>{{ $invoiceout->due }} Tk.</td>
              </tr>

          </tbody>
        </table>
        </div>
      </div>
 


      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->


<!-- main area -->
<div class="main-content">
  <div class="row">
  <div class="panel mb25">
    <div class="panel-heading border">
      Lab Copy
    </div>

    <div class="">
      <center>
        <h4>TRUST ONE HOSPITAL</h4>
        <p>Maijdee-Court , Noakhali. Hello : 01823387518</p>
        <P>Laboratory Copy</P>
      </center>
    </div>


    <div class="panel-body">
    <div class="row">

    <div class="col-md-6 pull-left">
      <table class="table table-bordered table-hover">
        <tbody>

            <tr>
              <td>Report ID</td>
              <td>{{ $invoiceout->id }}</td>
            </tr>
            <tr>
              <td>Patient Name</td>
              <td>{{ $invoiceout->patientout->name }}</td>
            </tr>
            <tr>
              <td>Reference Doctor</td>
              <td>{{ $invoiceout->patientout->doctor->name }}</td>
            </tr>
                      
        </tbody>
      </table>
      </div>

      <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>

            <tr>
              <td>Patient ID</td>
              <td>{{ $invoiceout->patientout->id }}</td>
            </tr>
            <tr>
              <td>Patient Mobile</td>
              <td>{{ $invoiceout->patientout->mobile }}</td>
            </tr>
            <tr>
              <td>Patient Address</td>
              <td>{{ $invoiceout->patientout->address }}</td>
            </tr>
          </tbody>
        </table>
        </div>

      </div>

      <div class="row col-md-12">
      <div class="table-responsive">  
     
      <table class="table table-bordered table-hover">
        <thead>
            <tr>
              <th width="50%">Test Name</th>
              <th width="30%">Room No.</th>
              <th width="20%">Price</th>
            </tr>
            </thead>

            <tbody>
              @foreach($invoiceoutproducts as $invoiceoutproduct)
                <tr>
                  <td>{{ $invoiceoutproduct->report_name }}</td>
                  <td>{{ $invoiceoutproduct->report_room }} </td>
                  <td>{{ $invoiceoutproduct->report_cost }} Tk.</td>
               </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
       <div class="col-md-6 pull-left">
        <table class="table table-bordered table-hover">
          <tbody>
            <p style="color: red;text-align: center;font-size: 40px;font-family:initial;padding-top: 130px;">
            @if($invoiceout->due== 0)
              PAID 
            @else
              DUE
            @endif
            </p>
            <p style="padding-top: 80px">Recipent Signature .... .... ... ... ... ... ... ...</p>
          </tbody>
        </table>
        </div>

        <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>
              
              <tr>
                <td width="50%">Subtotal</td>
                <td width="50%">{{ $invoiceout->subtotal }} Tk.</td>
              </tr>
              <tr>
                <td>Percent</td>
                <td>{{ $invoiceout->percent }} Tk.</td>
              </tr>
              <tr>
                <td>Percent Amount</td>
                <td>{{ $invoiceout->percent_amount }} Tk.</td>
              </tr>
              <tr>
                <td>Without Percent</td>
                <td>{{ $invoiceout->without_percent }} Tk.</td>
              </tr>
              <tr>
                <td>Discount Amount</td>
                <td>{{ $invoiceout->discount }} Tk.</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>{{ $invoiceout->total }} Tk.</td>
              </tr>
              <tr>
                <td>Paid</td>
                <td>{{ $invoiceout->receive_cash }} Tk.</td>
              </tr>
              <tr>
                <td>Due Money</td>
                <td>{{ $invoiceout->due }} Tk.</td>
              </tr>

          </tbody>
        </table>
        </div>
      </div>
 


      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->



<!-- main area -->
<div class="main-content">
  <div class="row">
  <div class="panel mb25">
    <div class="panel-heading border">
      Hospital Copy
    </div>

    <div class="">
      <center>
        <h4>TRUST ONE HOSPITAL</h4>
        <p>Maijdee-Court , Noakhali. Hello : 01823387518</p>
        <P>Hospital Copy</P>
      </center>
    </div>


    <div class="panel-body">
    <div class="row">

    <div class="col-md-6 pull-left">
      <table class="table table-bordered table-hover">
        <tbody>

            <tr>
              <td>Report ID</td>
              <td>{{ $invoiceout->id }}</td>
            </tr>
            <tr>
              <td>Patient Name</td>
              <td>{{ $invoiceout->patientout->name }}</td>
            </tr>
            <tr>
              <td>Reference Doctor</td>
              <td>{{ $invoiceout->patientout->doctor->name }}</td>
            </tr>
            <tr>
              <td>Patient Mobile</td>
              <td>{{ $invoiceout->patientout->mobile }}</td>
            </tr>             
        </tbody>
      </table>
      </div>

      <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>

            <tr>
              <td>Patient ID</td>
              <td>{{ $invoiceout->patientout->id }}</td>
            </tr>
            
            <tr>
              <td>Patient Address</td>
              <td>{{ $invoiceout->patientout->address }}</td>
            </tr>
            <tr>
              <td>Marketing Officer</td>
              <td>{{ $invoiceout->marketing->name }}</td>
            </tr>
            <tr>
              <td>Village Doctor</td>
              <td>{{ $invoiceout->village->name }}</td>
            </tr>
          </tbody>
        </table>
        </div>

      </div>

      <div class="row col-md-12">
      <div class="table-responsive">  
     
      <table class="table table-bordered table-hover">
        <thead>
            <tr>
              <th width="50%">Test Name</th>
              <th width="30%">Room No.</th>
              <th width="20%">Price</th>
            </tr>
            </thead>

            <tbody>
              @foreach($invoiceoutproducts as $invoiceoutproduct)
                <tr>
                  <td>{{ $invoiceoutproduct->report_name }}</td>
                  <td>{{ $invoiceoutproduct->report_room }} </td>
                  <td>{{ $invoiceoutproduct->report_cost }} Tk.</td>
               </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
       <div class="col-md-6 pull-left">
        <table class="table table-bordered table-hover">
          <tbody>
            <p style="color: red;text-align: center;font-size: 40px;font-family:initial;padding-top: 130px;">
            @if($invoiceout->due== 0)
              PAID 
            @else
              DUE
            @endif
            </p>
            <p style="padding-top: 80px">Recipent Signature .... .... ... ... ... ... ... ...</p>
          </tbody>
        </table>
        </div>

        <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>
              
              <tr>
                <td width="50%">Subtotal</td>
                <td width="50%">{{ $invoiceout->subtotal }} Tk.</td>
              </tr>
              <tr>
                <td>Percent</td>
                <td>{{ $invoiceout->percent }} Tk.</td>
              </tr>
              <tr>
                <td>Percent Amount</td>
                <td>{{ $invoiceout->percent_amount }} Tk.</td>
              </tr>
              <tr>
                <td>Without Percent</td>
                <td>{{ $invoiceout->without_percent }} Tk.</td>
              </tr>
              <tr>
                <td>Discount Amount</td>
                <td>{{ $invoiceout->discount }} Tk.</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>{{ $invoiceout->total }} Tk.</td>
              </tr>
              <tr>
                <td>Paid</td>
                <td>{{ $invoiceout->receive_cash }} Tk.</td>
              </tr>
              <tr>
                <td>Due Money</td>
                <td>{{ $invoiceout->due }} Tk.</td>
              </tr>

          </tbody>
        </table>
        </div>
      </div>
 


      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection


