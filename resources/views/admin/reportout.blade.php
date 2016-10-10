@extends('layouts.master')

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
          Add New Report
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
          Report Entry Information
        </div>
        <div class="panel-body">
        @if(Session::has('success1'))
        <div class="alert alert-success">
          {{Session::get('success1')}}
        </div>
       @endif
  

  <div class="col-xs-12">
    <div class="box">

    <form class="" method="post" action="" enctype="multipart/form-data">
    <div class='box-body'>  

    <div class="row col-md-6 pull-left">
    
    <div class="form-group form-inline">
      <label class="col-sm-4" >Report No : &nbsp;</label>
      <div class="input-group col-sm-6">
        <input name="memo_no" type="number" class="form-control" value="" required >
      </div>
    </div>  
    </div>  

    <div class="row col-md-6 pull-right">
    <div class="form-group form-inline">
      <label class="col-sm-4" >Marketing Officer : &nbsp;</label>
      <div class="input-group col-sm-6">
        <select name="marketing_id" class="form-control" id="marketing">
          <option value="">Select Marketig Officer</option>
          @foreach($marketings as $marketing)
            <option value="{{ $marketing->id }}">{{ $marketing->name }}</option>
          @endforeach
        </select>
      </div>
    </div>  
    </div>  

    <div class="row col-md-6 pull-left">
    <div class="form-group form-inline">
      <label class="col-sm-4" >Select Patient : &nbsp;</label>
      <div class="input-group col-sm-6">
        <select class="form-control" name="patientout_id">
          <option value="">Select Patient</option>
          @foreach($patientouts as $patientout)
            <option value="{{ $patientout->id }}">{{ $patientout->name }}</option>
          @endforeach
        </select>
      </div>
    </div>  
    </div>  

    <div class="row col-md-6 pull-right">
    <div class="form-group form-inline">
      <label class="col-sm-4" >Village Doctor : &nbsp;</label>
      <div class="input-group col-sm-6">
        <select name="village_id" id="village" class="form-control">
          <option value="">Select Village Doctor</option>
        </select>
      </div>
    </div>  
    </div>
            
   </div>

  
  <div class="box-body">
   <div class="table-responsive">  
   
    <table id="invoice_bill" class="table table-bordered table-hover">
     <thead>
      <tr>
        <th width="13%">Test ID</th>
        <th width="33%">Test Name</th>
        <th width="13%">Total</th>
        <th width="2%">Delete</th>
      </tr>
      </thead>

      <tbody>
        <tr>
          <td><input type="text" name="testId[]" id="testId" class="testId form-control"></td>
          <td><input type="text" name="testName[]" id="testName" class="testName form-control"></td>
          <td><input type="number" name="price[]" id="price" class="price form-control"></td>
          <td style="font-size: 25px;text-align: center;color: red;"><a href="#">X</a></td>
        </tr>
      </tbody>
    </table>
    </div>
    <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
      <button class="btn btn-success addmore" type="button">+ Add More</button>
    </div>

        
      <div class="row col-md-6 pull-right">
      <div class="form-group form-inline">
        <label class="col-sm-4" >Subtotal: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="subtotal" type="number" class="form-control" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Percent: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="percent" type="number" class="form-control" id="tax" placeholder="Percent" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
              <div class="input-group-addon">%</div>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Percent Amount: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="percent_amount" type="text" class="form-control" id="taxAmount" placeholder="Percent" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">          
        </div>
      </div>

      <div class="form-group form-inline">
        <label class="col-sm-4">Without Percent: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="without_percent" type="text" class="form-control" id="totalAftertax" placeholder="Without Percen" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Discount Amount: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="discount_amount" type="number" class="form-control" id="amountPaid" placeholder="Discount Amount" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Total : &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="total_paid" type="number" class="form-control amountDue" id="amountDue" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
        </div>
      </div>

          <div class="form-group">        
      <label class="col-sm-4"></label>  
      <div class="input-group col-sm-6">
      <input type=submit name="invoice" value="Save" class="btn btn-primary btn-lg btn-block">
      </div>
     
      </div> 
      </div>
      </div> <!--box body -->
      </form>
      </div>
   </div>

  <!-- Invoice System -->  


  </div>
</div>



  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection
@section('run_custom_jquery')
<script type="text/javascript">
  $('#marketing').on('change' , function(e){
    var marketing_id = e.target.value;

    $.get('/hospital/public/reportout_village?marketing_id=' + marketing_id, function(data){
      $('#village').empty();
      $.each(data, function(index,villageobj){
        $('#village').append('<option value="'+villageobj.id+'">'+villageobj.name+'</option>')
      });
    });
  });
</script>


<script type="text/javascript">
  $('#testName').autocomplete({
    source : 'http://localhost/hospital/public/autocomplete',
    minLength: 0,
    autoFocus:true,
    select:function(e,ui){
      $('#testId').val(ui.item.id);
      $('#price').val(ui.item.cost);
    }
  });
</script>

@endsection