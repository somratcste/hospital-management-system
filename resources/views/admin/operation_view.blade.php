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
  View Operation Details
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
  <div class="panel mb25">
    <div class="panel-heading border">
    	Opearation Information
    </div>

    <div class="">
      <center>
        <h4>Central HOSPITAL</h4>
        <p>Maijdee-Court , Noakhali. Hello : 01823387518</p>
        <p>Operation Information</p>
      </center>
    </div>


    <div class="panel-body">
    <div class="row">

    <div class="col-md-6 pull-left">
      <table class="table table-bordered table-hover">
        <tbody>

            <tr>
              <td>Operation ID</td>
              <td>{{ $operation->id }}</td>
            </tr>
            <tr>
            <tr>
              <td>Date</td>
              <td>{{ $operation->created_at->format('d-m-Y h:i A')}}</td>                      
        </tbody>
      </table>
      </div>

      <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>

            <tr>
              <td>Patient ID</td>
              <td>{{ $operation->patient_id }} / {{ $operation->created_at->format('m-d-Y')}}</td>
            </tr>
            </tr>
              <td>Patient Name</td>
              <td>{{ $operation->patient->name }}</td>
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
              <th width="50%">Operation Name</th>
              <th width="16%">Price</th>
            </tr>
            </thead>

            <tbody>
              @foreach($operationproducts as $operationproduct)
                <tr>
                  <td>{{ $operationproduct->operation_name }}</td>
                  <td>{{ $operationproduct->operation_cost }} Tk.</td>
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
                <th width="50%">Subtotal</th>
                <th width="50%">{{ $operation->subtotal }} Tk.</th>
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


