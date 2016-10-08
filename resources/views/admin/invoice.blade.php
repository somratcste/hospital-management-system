@extends('layouts.master')

@section('run_custom_css_file')
  <link href="{{ asset('styles/magicsuggest-min.css') }}" rel="stylesheet">
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
          Create New Invoice
        </p>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right hidden-xs">

      <li>
        <a href="javascript:;" data-toggle="dropdown">
          <img src="images/avatar.jpg" class="header-avatar img-circle ml10" alt="user" title="user">
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
          Invoice Creator
        </div>
        <div class="panel-body">
        <div class="col-lg-12">
        @if(Session::has('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
        @endif
        @if(count($errors) > 0)
        <div>
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
              {{$error}}
            @endforeach
          </ul>
        </div>
      @endif
      
    <form class="form-horizontal bordered-group" role="form" action="{{ route('invoice.store')}}" method="post" enctype="multipart/form-data">

          <div class="form-group">
              <label class="col-sm-2 control-label">Patient Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="{{$patient->id}} -- {{$patient->name}} -- @if($patient->patient_type == 1)Out @else Admit
                @endif " disabled>
                <input type="hidden" value="{{$patient->id}}" name="patient_id">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Admission Fee</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="admission" name="admission" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">{{ $difference }} Day's Before Rent</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="rent" name="rent" value="{{ $cost }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Consultation</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="consultation" name="consultation" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Doctor</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="doctor" name="doctor" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Surgeon Fee</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="surgeon" name="surgeon" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Anesthesia Fee</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="anesthesia" name="anesthesia" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">1st Assistant Fee</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="assistant1" name="assistant1" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">2nd Assistant Fee</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="assistant2" name="assistant2" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">O.T Charge</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="operation" name="operation" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Delivary Charge</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="delivary" name="delivary" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Medicine Charge</label>
              <div class="col-sm-8">
                <input type="text" class="form-control calculate" id="medicine" name="medicine" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Pathology</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="pathology" name="pathology" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">U.S.G</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="usg" name="usg" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">E.C.G</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="ecg" name="ecg" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">X-Ray</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="xray" name="xray" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nebulizer Charge</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="nebulizer" name="nebulizer" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Suction Charge</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="suction" name="suction" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Blood Transfusion</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="blood" name="blood" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Dressing</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="dressing" name="dressing" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Oxygen</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="oxygen" name="oxygen" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Canulla</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="canulla" name="canulla" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Catheter</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="catheter" name="catheter" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Ryles Tube</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="tube" name="tube" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Ambulance</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="ambulance" name="ambulance" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Baby Incubator</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="incubator" name="incubator" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Others</label>
              <div class="col-sm-8">
                <input type="number" class="form-control calculate" id="others" name="others" value="0" required>
              </div>
            </div>


      <div class="row col-md-6 pull-right">
      <div class="form-group form-inline">
        <label class="col-sm-4" >Subtotal: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="subtotal" type="number" class="form-control" id="subTotal" placeholder="Subtotal" required>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">VAT: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="vat" type="number" class="form-control" id="tax" placeholder="Percent" required>
              <div class="input-group-addon">%</div>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Service Charge: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="service" type="text" class="form-control" id="taxAmount" placeholder="Service Charge" required>          
        </div>
      </div>

      <div class="form-group form-inline">
        <label class="col-sm-4">Total Amount: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="total_amount" type="text" class="form-control" id="totalAftertax" placeholder="Total Amout" required>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Discount Amount: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="discount" type="number" class="form-control" id="discount" value="0" required>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4"><button type="button" id="total" class="btn btn-primary">Total</button></label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="total" type="number" class="form-control" id="totalAmount" placeholder="Total" required>
        </div>
      </div>

      <div class="form-group">        
      <label class="col-sm-4"></label>  
      <div class="input-group col-sm-6">
      <input type=submit name="invoice" value="Add Invoice" class="btn btn-success btn-lg btn-block">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
      </div>
     
      </div>
      </form>

      </div>

            


      </div>
      </div>
    </div>
  </div>
  <!-- /main area -->
</div>

@endsection


@section('run_custom_jquery')
<script type="text/javascript">
  $(document ).ready(function() {
    $(".calculate").keyup(function(){
      var admission = $("#admission").val();
      var rent = $("#rent").val();
      var consultation = $("#consultation").val();
      var doctor = $("#doctor").val();
      var surgeon = $("#surgeon").val();
      var anesthesia = $("#anesthesia").val();
      var assistant1 = $("#assistant1").val();
      var assistant2 = $("#assistant2").val();
      var operation = $("#operation").val();
      var delivary = $("#delivary").val();
      var medicine = $("#medicine").val();
      var pathology = $("#pathology").val();
      var usg = $("#usg").val();
      var ecg = $("#ecg").val();
      var xray = $("#xray").val();
      var nebulizer = $("#nebulizer").val();
      var suction = $("#suction").val();
      var blood = $("#blood").val();
      var dressing = $("#dressing").val();
      var oxygen = $("#oxygen").val();
      var canulla = $("#canulla").val();
      var catheter = $("#catheter").val();
      var tube = $("#tube").val();
      var ambulance = $("#ambulance").val();
      var incubator = $("#incubator").val();
      var others = $("#others").val();
      if(admission!= "" && pathology!= "") {
        $("#subTotal").val(parseInt(admission)+parseInt(rent)+parseInt(consultation)+parseInt(doctor)+parseInt(surgeon)+parseInt(anesthesia)+parseInt(assistant1)+parseInt(assistant2)+parseInt(operation)+parseInt(delivary)+parseInt(medicine)+parseInt(pathology)+parseInt(usg)+parseInt(ecg)+parseInt(xray)+parseInt(nebulizer)+parseInt(suction)+parseInt(blood)+parseInt(dressing)+parseInt(oxygen)+parseInt(canulla)+parseInt(catheter)+parseInt(tube)+parseInt(ambulance)+parseInt(incubator)+parseInt(others));
      } else {
        $("#subTotal").val("");
      }
    });

    $("#total").click(function() {

      $("#taxAmount").val(function() {
        var result = (parseFloat($("#tax").val()) *  parseFloat($("#subTotal").val()) / 100).toFixed(2)
        if(!isFinite(result)) result = 0 ;
        return result;
      });

      $("#totalAftertax").val(function() {
        var result = (parseFloat($("#subTotal").val()) + parseFloat($("#taxAmount").val())).toFixed(2);
        if(!isFinite(result)) result = 0 ;
        return result;
      });

      $("#totalAmount").val(function() {
        var result = (parseFloat($("#subTotal").val()) + parseFloat($("#taxAmount").val()) - parseFloat($("#discount").val())).toFixed();
        if(!isFinite(result)) result = 0 ;
        return result;
      });

    });

});
</script>
@endsection