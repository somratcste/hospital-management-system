@extends('layouts.master')

@section('run_custom_css')
<style type="text/css">
  @media print {
    .panel-heading {
      display: none;
    }
     {
      line-height: 8px;
    }
    .print_second {
      margin-top: 200px;
    }
  }
</style>
@endsection
@section('top_header')
  View Invoice Details
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
  <div class="panel mb25">
    <div class="panel-heading border">
    	Money Receipt
    </div>

    <div class="">
      <center>
        <h4>Central HOSPITAL</h4>
        <p>Maijdee-Court , Noakhali. Hello : 01823387518</p>
        <p>Money Receipt</p>
      </center>
    </div>


    <div class="panel-body">
    <div class="row">

    <div class="col-md-6 pull-left">
      <table class="table table-bordered table-hover">
        <tbody>

            <tr>
              <td>Invoice ID</td>
              <td>{{ $invoice->id }}</td>
            </tr>
            <tr>
            <tr>
              <td>Release Date</td>
              <td>{{ $invoice->updated_at->format('d-m-Y h:i A')}}</td>                      
        </tbody>
      </table>
      </div>

      <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>

            <tr>
              <td>Patient ID</td>
              <td>{{ $invoice->patient_id }} / {{ $invoice->created_at->format('m-d-Y h:i A')}}</td>
            </tr>
            </tr>
              <td>Patient Name</td>
              <td>{{ $invoice->patient->name }}</td>
            </tr>            
          </tbody>
        </table>
        </div>

      </div>

      <div class="row">
      <div class="col-md-12">
          <div class="col-xs-2"></div>
          <div class="col-xs-3">
            <p>Admission Fee</p>
            <p>Bed/Cabin Rent</p>
            <p>Consultation</p>
            <!-- <p>Doctor</p> -->
            @if($invoice->surgeon != 0)
            <p>Surgeon Fee</p>
            @endif
            @if($invoice->anesthesia != 0)
            <p>Anesthesia Fee</p>
            @endif
            @if($invoice->assistant1 != 0)
            <p>1st Assistant Fee</p>
            @endif
            @if($invoice->assistant2 != 0)
            <p>2nd Assistant Fee</p>
            @endif
            @if($invoice->operation != 0)
            <p>Operation Charge</p>
            @endif
            @if($invoice->delivary != 0)
            <p>Delivary Charge</p>
            @endif
            <p>Medicine Charge</p>
            <p>Pathology</p>
        <!--<P>U.S.G</P>
            <P>E.C.G</P>
            <P>X-Ray</P> -->
            @if($invoice->nebulizer != 0)
            <p>Nebulizer Charge</p>
            @endif
            @if($invoice->suction != 0)
            <p>Suction Charge</p>
            @endif
            @if($invoice->blood != 0)
            <p>Blood Transfusion</p>
            @endif
            @if($invoice->dressing != 0)
            <p>Dressing</p>
            @endif
            @if($invoice->oxygen != 0)
            <p>Oxygen</p>
            @endif
            @if($invoice->canulla != 0)
            <p>Canulla</p>
            @endif
            @if($invoice->catheter != 0)
            <p>Catheter</p>
            @endif
            @if($invoice->tube != 0)
            <p>Ryles Tube</p>
            @endif
            @if($invoice->ambulance != 0)
            <p>Ambulance</p>
            @endif
            @if($invoice->incubator != 0)
            <p>Baby Incubator</p>
            @endif
            <p>Service Charge</p>
            @if($invoice->others != 0)
            <p>Others</p>
            @endif
            <hr/>
            <p>Subtotal</p>
            <p>Discount</p>
            <p>Total</p>
          </div>
          
          <div class="col-xs-4" style="padding-top: 60px;">
            @if($invoice->total == $invoice->receive_cash)
              <img class="img-responsive" src="{{ asset('images/paid.png')}}">
            @else
              <img class="img-responsive" src="{{ asset('images/due.png')}}">
            @endif
          </div>
          <div class="col-xs-3">
            <p> : {{ $invoice->admission}} Tk.</p>
            <p> : {{ $invoice->rent}} Tk.</p>
            <p> : {{ $invoice->consultation}} Tk.</p>
            <!-- <p> : {{ $invoice->doctor}} Tk.</p> -->
            @if($invoice->surgeon != 0)
            <p> : {{ $invoice->surgeon}} Tk.</p>
            @endif
            @if($invoice->anesthesia != 0)
            <p> : {{ $invoice->anesthesia}} Tk.</p>
            @endif
            @if($invoice->assistant1 != 0)
            <p> : {{ $invoice->assistant1}} Tk.</p>
            @endif
            @if($invoice->assistant2 != 0)
            <p> : {{ $invoice->assistant2}} Tk.</p>
            @endif
            @if($invoice->operation != 0)
            <p> : {{ $invoice->operation}} Tk.</p>
            @endif
            @if($invoice->delivary != 0)
            <p> : {{ $invoice->delivary}} Tk.</p>
            @endif
            <p> : {{ $invoice->medicine}} Tk.</p>
            <p> : {{ $invoice->pathology}} Tk.</p>
            <!-- <p> : {{ $invoice->usg}} Tk.</p>
            <p> : {{ $invoice->ecg}} Tk.</p>
            <p> : {{ $invoice->xray}} Tk.</p>  -->  
            @if($invoice->nebulizer != 0)
            <p> : {{ $invoice->nebulizer}} Tk.</p>
            @endif
            @if($invoice->suction != 0)
            <p> : {{ $invoice->suction}} Tk.</p>
            @endif
            @if($invoice->blood != 0)
            <p> : {{ $invoice->blood}} Tk.</p>
            @endif
            @if($invoice->dressing != 0)
            <p> : {{ $invoice->dressing}} Tk.</p>
            @endif
            @if($invoice->oxygen != 0)
            <p> : {{ $invoice->oxygen}} Tk.</p>
            @endif
            @if($invoice->canulla != 0)
            <p> : {{ $invoice->canulla}} Tk.</p>
            @endif
            @if($invoice->catheter != 0)
            <p> : {{ $invoice->catheter}} Tk.</p>
            @endif
            @if($invoice->tube != 0)
            <p> : {{ $invoice->tube}} Tk.</p>
            @endif
            @if($invoice->ambulance != 0)
            <p> : {{ $invoice->ambulance}} Tk.</p>
            @endif
            @if($invoice->incubator != 0)
            <p> : {{ $invoice->incubator}} Tk.</p>
            @endif
            <p> : {{ $invoice->service}} Tk.</p>
            @if($invoice->others != 0)
            <p> : {{ $invoice->others}} Tk.</p>
            @endif
            <hr/>
            <p> : {{ $invoice->total_amount}} Tk.</p>
            <p> : {{ $invoice->discount }} Tk.</p>
            <p> : {{ $invoice->total}} Tk.</p>
         </div>


      </div>
      </div>

      <!-- <div class="row">
       <div class="col-md-6 pull-left">
        <table class="table table-bordered table-hover">
          <tbody>
            <p style="color: red;text-align: center;font-size: 40px;font-family:initial;padding-top: 50px;">
            @if($invoice->due== 0)
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
                <td width="50%">{{ $invoice->subtotal }} Tk.</td>
              </tr>
                
              <tr>
                <td>Discount</td>
                <td>{{ number_format($invoice->discount + $invoice->percent_amount) }} Tk.</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>{{ $invoice->total }} Tk.</td>
              </tr>
              <tr>
                <td>Paid</td>
                <td>{{ $invoice->receive_cash }} Tk.</td>
              </tr>
              <tr>
                <td>Due </td>
                <td>{{ $invoice->due }} Tk.</td>
              </tr>
          </tbody>
        </table> 
        </div>
      </div> -->
 


      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->

@endsection


