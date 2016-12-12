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
        <h4>CENTRAL HOSPITAL</h4>
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
              <td>{{ $invoiceout->patient_id }}-{{ $invoiceout->created_at->format('m-d-Y')}}</td>
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
            @if($refund->less== 0)
              Refund = {{ $refund->refund }} Tk.
            @elseif ($refund->refund == 0)
              Less = {{ $refund->less }} Tk.
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
                <td width="50%">{{ $refund->subtotal }} Tk.</td>
              </tr>
              <tr>
                <td>Percent</td>
                <td>{{ $refund->percent }} %</td>
              </tr>
              <tr>
                <td>Percent Amount</td>
                <td>{{ $refund->percent_amount }} Tk.</td>
              </tr>
              <tr>
                <td>Without Percent</td>
                <td>{{ $refund->without_percent }} Tk.</td>
              </tr>
              <tr>
                <td>Discount Amount</td>
                <td>{{ $refund->discount }} Tk.</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>{{ $refund->total }} Tk.</td>
              </tr>
              <tr>
                <td>Paid</td>
                <td>{{ $invoiceout->receive_cash }} Tk.</td>
              </tr>
              @if($refund->less == 0)
                <tr>
                  <td>Refund</td>
                  <td>{{ $refund->refund }} Tk.</td>
                </tr> 
              @elseif ($refund->refund == 0)
                <tr>
                  <td>Less</td>
                  <td>{{ $refund->less }} Tk.</td>
                </tr>
              @endif

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
        <h4>CENTRAL HOSPITAL</h4>
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
            @if($refund->less== 0)
              Refund = {{ $refund->refund }} Tk.
            @elseif ($refund->refund == 0)
              Less = {{ $refund->less }} Tk.
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
                <td width="50%">{{ $refund->subtotal }} Tk.</td>
              </tr>
              <tr>
                <td>Percent</td>
                <td>{{ $refund->percent }} %</td>
              </tr>
              <tr>
                <td>Percent Amount</td>
                <td>{{ $refund->percent_amount }} Tk.</td>
              </tr>
              <tr>
                <td>Without Percent</td>
                <td>{{ $refund->without_percent }} Tk.</td>
              </tr>
              <tr>
                <td>Discount Amount</td>
                <td>{{ $refund->discount }} Tk.</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>{{ $refund->total }} Tk.</td>
              </tr>
              <tr>
                <td>Paid</td>
                <td>{{ $invoiceout->receive_cash }} Tk.</td>
              </tr>
              @if($refund->less == 0)
                <tr>
                  <td>Refund</td>
                  <td>{{ $refund->refund }} Tk.</td>
                </tr> 
              @elseif ($refund->refund == 0)
                <tr>
                  <td>Less</td>
                  <td>{{ $refund->less }} Tk.</td>
                </tr>
              @endif

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
        <h4>CENTRAL HOSPITAL</h4>
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
            @if($refund->less== 0)
              Refund = {{ $refund->refund }} Tk.
            @elseif ($refund->refund == 0)
              Less = {{ $refund->less }} Tk.
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
                <td width="50%">{{ $refund->subtotal }} Tk.</td>
              </tr>
              <tr>
                <td>Percent</td>
                <td>{{ $refund->percent }} %</td>
              </tr>
              <tr>
                <td>Percent Amount</td>
                <td>{{ $refund->percent_amount }} Tk.</td>
              </tr>
              <tr>
                <td>Without Percent</td>
                <td>{{ $refund->without_percent }} Tk.</td>
              </tr>
              <tr>
                <td>Discount Amount</td>
                <td>{{ $refund->discount }} Tk.</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>{{ $refund->total }} Tk.</td>
              </tr>
              <tr>
                <td>Paid</td>
                <td>{{ $invoiceout->receive_cash }} Tk.</td>
              </tr>
              @if($refund->less == 0)
                <tr>
                  <td>Refund</td>
                  <td>{{ $refund->refund }} Tk.</td>
                </tr> 
              @elseif ($refund->refund == 0)
                <tr>
                  <td>Less</td>
                  <td>{{ $refund->less }} Tk.</td>
                </tr>
              @endif

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


