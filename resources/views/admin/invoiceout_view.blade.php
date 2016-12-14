@extends('layouts.master')

@section('run_custom_css')
<style type="text/css">
  @media print {
    .panel-heading {
      display: none;
    }
    .print_second {
      margin-top: 200px;
    }
  }
</style>
@endsection
@section('top_header')
  View Report Details
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
        <h4>Central HOSPITAL</h4>
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
            <tr>
              <td>Date</td>
              <td>{{ $invoiceout->created_at->format('d-m-Y h:i A')}}</td>
            </tr>
            <tr>
              <td>Delivary Date</td>
              <td>{{ $delivaryTime }}</td>
            <tr>
              <td>Reference Doctor</td>
              <td>{{ $invoiceout->patientout->doctor->name }}</td>
            </tr>
            <tr>
              <td>Patient Address</td>
              <td>{{ $invoiceout->patientout->address }}</td>
            </tr>
                      
        </tbody>
      </table>
      </div>

      <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>

            <tr>
              <td>Patient ID</td>
              <td>{{ $invoiceout->patient_id }} / {{ $invoiceout->created_at->format('m-d-Y')}}</td>
            </tr>
            </tr>
              <td>Patient Name</td>
              <td>{{ $invoiceout->patientout->name }}</td>
            </tr>
            <tr>
              <td>Age</td>
              <td>{{ $invoiceout->patientout->age }} years</td>
            </tr>
            <tr>
              <td>Hello</td>
              <td>+880{{ $invoiceout->patientout->mobile }}</td>
            </tr>
            
            <tr>
              <td>Sex</td>
              <td>
                @if($invoiceout->patientout->gender=='m')
                  Male 
                @else 
                  Female 
                @endif
              </td>
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
            <p style="color: red;text-align: center;font-size: 40px;font-family:initial;padding-top: 50px;">
            @if($invoiceout->due== 0)
              PAID 
            @else
              DUE
            @endif
            </p>
            <p style="padding-top:28px;text-transform: capitalize;"><b>Collected By :: </b>{{ Auth::user()->name }}</p>
            <p style="text-transform: capitalize;">Received with thanks Tk. {{ $money }} Only</p>
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
                <td>Discount</td>
                <td>{{ number_format($invoiceout->discount + $invoiceout->percent_amount) }} Tk.</td>
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
                <td>Due </td>
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
  <div class="row print_second">
  <div class="panel mb25">
    <div class="panel-heading border">
      Patient Copy
    </div>

    <div class="">
      <center>
        <h4>Central HOSPITAL</h4>
        <p>Maijdee-Court , Noakhali. Hello : 01823387518</p>
        <p>Office Copy</p>
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
            <tr>
              <td>Date</td>
              <td>{{ $invoiceout->created_at->format('d-m-Y h:i A')}}</td>
            </tr>
            <tr>
              <td>Delivary Date</td>
              <td>{{ $delivaryTime }}</td>
            <tr>
              <td>Reference Doctor</td>
              <td>{{ $invoiceout->patientout->doctor->name }}</td>
            </tr>
            <tr>
              <td>Patient Address</td>
              <td>{{ $invoiceout->patientout->address }}</td>
            </tr>
            <tr>
              <td>Marketing Officer</td>
              <td>{{ $invoiceout->marketing->name }}</td>
            </tr>
                      
        </tbody>
      </table>
      </div>

      <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>

            <tr>
              <td>Patient ID</td>
              <td>{{ $invoiceout->patient_id }} / {{ $invoiceout->created_at->format('m-d-Y')}}</td>
            </tr>
            </tr>
              <td>Patient Name</td>
              <td>{{ $invoiceout->patientout->name }}</td>
            </tr>
            <tr>
              <td>Age</td>
              <td>{{ $invoiceout->patientout->age }} years</td>
            </tr>
            <tr>
              <td>Hello</td>
              <td>+880{{ $invoiceout->patientout->mobile }}</td>
            </tr>
            
            <tr>
              <td>Sex</td>
              <td>
                @if($invoiceout->patientout->gender=='m')
                  Male 
                @else 
                  Female 
                @endif
              </td>
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
            <p style="color: red;text-align: center;font-size: 40px;font-family:initial;padding-top: 50px;">
            @if($invoiceout->due== 0)
              PAID 
            @else
              DUE
            @endif
            </p>
            <p style="padding-top:28px;text-transform: capitalize;"><b>Collected By :: </b>{{ Auth::user()->name }}</p>
            <p style="text-transform: capitalize;">Received with thanks Tk. {{ $money }} Only</p>
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
                <td>Discount</td>
                <td>{{ number_format($invoiceout->discount + $invoiceout->percent_amount) }} Tk.</td>
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
                <td>Due </td>
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


