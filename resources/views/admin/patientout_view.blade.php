@extends('layouts.master')

@section('run_custom_css')
<style type="text/css">
  @media print {
    .panel-heading {
      display: none;
    }
    .panel-body {
    
  }
</style>
@endsection

@section('top_header')
  View Patient Details
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
        <p>Patient Copy. <b>Serial No :- {{ $serial }}</b> </p>
      </center>
    </div>
        <div class="panel-body">

      <div class="table-responsive">
        <div class="col-md-6 col-md-offset-3">
        <table class="table table-bordered table-striped mb0">
          <tbody>
              <tr>
              	<td>Patient ID</td>
              	<td>{{ $patient->id }}</td>
              </tr>
              <tr>
              	<td>Patient Name</td>
              	<td>{{ $patient->name }}</td>
              </tr>
              <tr>
              	<td>Selected Doctor</td>
              	<td>{{ $doctor->name }}</td>
              </tr>
              <tr>
              	<td>Visiting Charge</td>
              	<td>{{ $doctor->charge }} Tk.</td>
              </tr>
              <tr>
              	<td>Date/Time</td>
              	<td>{{ $date }}</td>
              </tr>
              <tr>
                <td>@if($due_status=="1") {{"Due"}}@endif</td>
                <td>{{$paid_status}}</td>
              </tr>
              <tr>
                <td><p>Recipent Signature .... ....</p></td>
                <td></td>
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
        <p>Hospital Copy. <b>Serial No :- {{ $serial }}</b> </p>
      </center>
    </div>
        <div class="panel-body">

      <div class="table-responsive">
        <div class="col-md-6 col-md-offset-3">
        <table class="table table-bordered table-striped mb0">
          <tbody>
              <tr>
                <td>Patient ID</td>
                <td>{{ $patient->id }}</td>
              </tr>
              <tr>
                <td>Patient Name</td>
                <td>{{ $patient->name }}</td>
              </tr>
              <tr>
                <td>Selected Doctor</td>
                <td>{{ $doctor->name }}</td>
              </tr>
              <tr>
                <td>Visiting Charge</td>
                <td>{{ $doctor->charge }} Tk.</td>
              </tr>
              <tr>
                <td>Date/Time</td>
                <td>{{ $date }}</td>
              </tr>
              <tr>
                <td>@if($due_status=="1") {{"Due"}}@endif</td>
                <td>{{$paid_status}}</td>
              </tr>
              <tr>
                <td><p>Recipent Signature .... ....</p></td>
                <td></td>
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