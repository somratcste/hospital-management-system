@extends('layouts.master')

@section('top_header')
  View Patient Details
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
        	Serial No :- {{ $serial }}
        </div>
        <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
      @endif

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
              	<td>{{ $doctor->charge }}</td>
              </tr>
              <tr>
              	<td>Date/Time</td>
              	<td>{{ $date }}</td>
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