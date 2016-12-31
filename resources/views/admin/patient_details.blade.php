 @extends('layouts.master')

@section('top_header')
  Patient's Details Information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <!--Patient info start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Patients Information 
        </div>
        <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
      @endif
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th width="50%">Name</th>
              <th width="50%">Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              	<td>{{ "Admit Date / Time" }}</td>
              	<td>{{ $patient->created_at->format('d-m-Y h:i:s A') }}</td>
            </tr>
            <tr>
            	<td>{{ "Name" }}</td>
            	<td>{{ $patient->name }}</td>
            </tr>
            <tr>
            	<td>{{ "Patient ID" }}</td>
            	<td>{{ $patient->id }} / {{ $patient->created_at->format('m-d-Y') }}</td>
            </tr>
            <tr>
            	<td>{{ "Consultant" }}</td>
            	<td>{{ $patient->doctor->name }}</td>
            </tr>
            <tr>
            	<td>{{ "Father's Name" }}</td>
            	<td>{{ $patient->fname }}</td>
            </tr>
            <tr>
            	<td>{{ "Gender" }}</td>
            	<td>{{ $patient->gender }}</td>
            </tr>
            <tr>
            	<td>{{ "Blood Group" }}</td>
            	<td>{{ $patient->bloodGroup }}</td>
            </tr>
            <tr>
            	<td>{{ "Age" }}</td>
            	<td>{{ $patient->age }}</td>
            </tr>
            <tr>
            	<td>{{ "Religion" }}</td>
            	<td>{{ $patient->religion }}</td>
            </tr>
            <tr>
            	<td>{{ "Occupation" }}</td>
            	<td>{{ $patient->occupation }}</td>
            </tr>
            <tr>
            	<td>{{ "Bed No." }}</td>
            	<td>{{ $patient->seat->seatFloor }} Floor {{ $patient->seat->seatNo }} No. Bed </td>
            </tr>
            <tr>
            	<td>{{ "Personal Phone" }}</td>
            	<td>{{ $patient->pphone }}</td>
            </tr>
            <tr>
            	<td>{{ "Home Phone" }}</td>
            	<td>{{ $patient->hphone }}</td>
            </tr>
            <tr>
            	<td>{{ "Local Address" }}</td>
            	<td>{{ $patient->laddress }}</td>
            </tr>
            <tr>
            	<td>{{ "Permanent Address" }}</td>
            	<td>{{ $patient->paddress }}</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Value</th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!--Patient Info end -->


  <!--Report info start -->
  @php
    if($report == NULL){
    } else {
  @endphp
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Report Information 
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
       <div class="col-md-6 pull-left">
        <table class="table table-bordered table-hover">
          <tbody>
            <p style="color: red;text-align: center;font-size: 40px;font-family:initial;padding-top: 50px;">
            @if($report->due== 0)
              PAID 
            @else
              DUE
            @endif
            </p>
            <p style="padding-top:28px;text-transform: capitalize;"><b>Collected By :: </b>{{ Auth::user()->name }}</p>
            <p style="text-transform: capitalize;">Received with thanks Tk. {{ $money_report }} Only</p>
          </tbody>
        </table>
        </div>

        <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>
              
              <tr>
                <td width="50%">Subtotal</td>
                <td width="50%">{{ $report->subtotal }} Tk.</td>
              </tr>
                
              <tr>
                <td>Discount</td>
                <td>{{ number_format($report->discount + $report->percent_amount) }} Tk.</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>{{ $report->total }} Tk.</td>
              </tr>
              <tr>
                <td>Paid</td>
                <td>{{ $report->receive_cash }} Tk.</td>
              </tr>
              <tr>
                <td>Due </td>
                <td>{{ $report->due }} Tk.</td>
              </tr>

          </tbody>
        </table>
        </div>
      </div>

      </div>
    </div>
  </div>
  @php } @endphp
  <!--Report Info end -->

  <!--Operation info start -->
  @php
    if($operation == NULL){
    } else {
  @endphp
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Operation Information 
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
  @php } @endphp
  <!--Operation Info end -->

  <!--Invoice info start -->
  @php
    if($invoice==NULL){
    } else {
  @endphp
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Invoice Information 
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
              <td>{{ $invoice->name }}</td>
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

      </div>
    </div>
  </div>
  @php } @endphp
  <!--Invoice Info end -->

  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection