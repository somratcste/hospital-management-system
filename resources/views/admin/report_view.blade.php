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
    	Test Information
    </div>

    <div class="">
      <center>
        <h4>Central HOSPITAL</h4>
        <p>Maijdee-Court , Noakhali. Hello : 01823387518</p>
        <p>Test Information</p>
      </center>
    </div>


    <div class="panel-body">
    <div class="row">

    <div class="col-md-6 pull-left">
      <table class="table table-bordered table-hover">
        <tbody>

            <tr>
              <td>Report ID</td>
              <td>{{ $report->id }}</td>
            </tr>
            <tr>
            <tr>
              <td>Date</td>
              <td>{{ $report->created_at->format('d-m-Y h:i A')}}</td>                      
        </tbody>
      </table>
      </div>

      <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>

            <tr>
              <td>Patient ID</td>
              <td>{{ $report->patient_id }} / {{ $report->created_at->format('m-d-Y')}}</td>
            </tr>
            </tr>
              <td>Patient Name</td>
              <td>{{ $report->patient->name }}</td>
            </tr>            
          </tbody>
        </table>
        </div>

      </div>

      <div class="row">
      <div class="col-md-12">
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
              @foreach($reportproducts as $reportproduct)
                <tr>
                  <td>{{ $reportproduct->report_name }}</td>
                  <td>{{ $reportproduct->report_room }} </td>
                  <td>{{ $reportproduct->report_cost }} Tk.</td>
               </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>
              
              <tr>
                <td width="50%">Subtotal</td>
                <td width="50%">{{ $report->subtotal }} Tk.</td>
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


