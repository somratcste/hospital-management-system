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
        <form action="" method="POST">
        {{ csrf_field() }}
        <div class="panel-body">
        @if(Session::has('success1'))
        <div class="alert alert-success">
          {{Session::get('success1')}}
        </div>
       @endif
          <!-- <div class="form-group clear">
            <label class="col-sm-2 control-label">Report ID</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Select Patient</label>
            <div class="col-sm-7">
              <select class="form-control" name="patientout_id">
                <option value="">Select Patient</option>
                @foreach($patientouts as $patientout)
                  <option value="{{ $patientout->id }}">{{ $patientout->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Visiting Doctor</label>
            <div class="col-sm-7">
              <select class="form-control" name="doctor_id">
                <option value="">Select Doctor</option>
                @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Marketing Officer</label>
            <div class="col-sm-7">
              <select name="marketing_id" class="form-control" id="marketing">
                <option value="">Select Marketig Officer</option>
                @foreach($marketings as $marketing)
                  <option value="{{ $marketing->id }}">{{ $marketing->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Village Doctor</label>
            <div class="col-sm-7">
              <select name="village_id" id="village" class="form-control">
                <option value="">Select Village Doctor</option>
              </select>
            </div>
          </div>

  


        </div>
        <div class="panel-footer" style="overflow: hidden;">
          <button type="submit" class="btn btn-success pull-right">Save</button>
        </div>
        </form> -->
    



  <!-- Invoice System -->

  <div class="col-xs-12">
    <div class="box">

    <form class="" method="post" action="" enctype="multipart/form-data">
    <div class='box-body'>  
    <div class="row col-md-6 pull-left">
    
    <div class="form-group form-inline">
      <label class="col-sm-4" >Memo No : &nbsp;</label>
      <div class="input-group col-sm-6">
        <input name="memo_no" type="number" class="form-control" value="" required >
      </div>
    </div>  
    </div>  

    <div class="row col-md-6 pull-right">
    <div class="form-group form-inline">
      <label class="col-sm-4" >Date : &nbsp;</label>
      <div class="input-group col-sm-6">
        <input name="m_date" type="date" class="form-control" required>
      </div>
    </div>  
    </div>  

    <div class="row col-md-6 pull-left">
    <div class="form-group form-inline">
      <label class="col-sm-4" >Customar Name : &nbsp;</label>
      <div class="input-group col-sm-6">
        <input name="customar_name" type="text" class="form-control" placeholder="customar name">
      </div>
    </div>  
    </div>  

    <div class="row col-md-6 pull-right">
    <div class="form-group form-inline">
      <label class="col-sm-4" >Sex : &nbsp;</label>
      <div class="input-group col-sm-6">
        <select name="sex" class="form-control" id="sel1">
          <option value=" ">Select Sex</option>
              <option value="1">Male</option>
              <option value="2">Female</option>
          </select>
      </div>
    </div>  
    </div>

    <div class="row col-md-6 pull-left">
    <div class="form-group form-inline">
      <label class="col-sm-4" >Age : &nbsp;</label>
      <div class="input-group col-sm-6">
        <input name="age" type="number" class="form-control" placeholder="age">
      </div>
    </div>  
    </div>

    <div class="row col-md-6 pull-right">
    <div class="form-group form-inline">
      <label class="col-sm-4" >Ref. Doctor : &nbsp;</label>
      <div class="input-group col-sm-6">
              <select class="form-control" name="doc_id">
              <option value="">Select A Doctor</option>
              


                  <option value="">ssss</option>

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
        <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
        <th width="33%">Test Name</th>
        <th width="13%">Price</th>
        <th width="13%">Total</th>
      </tr>
              </thead>

              <tbody>
                <tr>
        <td><input class="case" type="checkbox"/></td>
        <td><input type="text" data-type="productName" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
        <td><input type="number" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
        <td><input type="number" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
      </tr>
              </tbody>
            </table>
          </div>
       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
      <button class="btn btn-danger delete" type="button">- Delete</button>
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
  /**
 * Site : http:www.smarttutorials.net
 * @author muni
 */
        
//adds extra table rows
var i=$('#invoice_bill tr').length;
$(".addmore").on('click',function(){
  html = '<tr>';
  html += '<td><input class="case" type="checkbox"/></td>';
  html += '<td><input type="text" data-type="productName" name="itemName[]" id="itemName_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
  html += '<td><input type="text" name="price[]" id="price_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
  html += '<td><input type="text" name="total[]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
  html += '</tr>';
  $('#invoice_bill').append(html);
  i++;
});

//to check all checkboxes
$(document).on('change','#check_all',function(){
  $('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$(".delete").on('click', function() {
  $('.case:checkbox:checked').parents("tr").remove();
  $('#check_all').prop("checked", false); 
  calculateTotal();
});

//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){
  type = $(this).data('type');
  
  if(type =='productCode' )autoTypeNo=0;
  if(type =='productName' )autoTypeNo=1;  
  
  $(this).autocomplete({
    source: function( request, response ) {
      $.ajax({
        url : 'ajax.php',
        dataType: "json",
        method: 'post',
        data: {
           name_startsWith: request.term,
           type: type
        },
         success: function( data ) {
           response( $.map( data, function( item ) {
            var code = item.split("|");
            return {
              label: code[autoTypeNo],
              value: code[autoTypeNo],
              data : item
            }
          }));
        }
      });
    },
    autoFocus: true,          
    minLength: 0,
    select: function( event, ui ) {
      var names = ui.item.data.split("|");            
      id_arr = $(this).attr('id');
        id = id_arr.split("_");
      $('#itemNo_'+id[1]).val(names[0]);
      $('#itemName_'+id[1]).val(names[1]);
      $('#itemAvailable_'+id[1]).val(names[2]);
      $('#price_'+id[1]).val(names[3]);
      $('#total_'+id[1]).val( 1*names[3] );
      calculateTotal();
    }           
  });
});

//price change
$(document).on('change keyup blur','.changesNo',function(){
  id_arr = $(this).attr('id');
  id = id_arr.split("_");
  price = $('#price_'+id[1]).val();
  if( price !='' ) $('#total_'+id[1]).val((parseFloat(price)).toFixed(2) ); 
  calculateTotal();
});

$(document).on('change keyup blur','#tax',function(){
  calculateTotal();
});

//total price calculation 
function calculateTotal(){
  subTotal = 0 ; total = 0; 
  $('.totalLinePrice').each(function(){
    if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
  });
  $('#subTotal').val( subTotal.toFixed(2) );
  tax = $('#tax').val();
  if(tax != '' && typeof(tax) != "undefined" ){
    taxAmount = subTotal * ( parseFloat(tax) /100 );
    $('#taxAmount').val(taxAmount.toFixed(2));
    total = subTotal - taxAmount;
  }else{
    $('#taxAmount').val(0);
    total = subTotal;
  }
  $('#totalAftertax').val( total.toFixed(2) );
  calculateAmountDue();
}

$(document).on('change keyup blur','#amountPaid',function(){
  calculateAmountDue();
});

//due amount calculation
function calculateAmountDue(){
  amountPaid = $('#amountPaid').val();
  total = $('#totalAftertax').val();
  if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
    amountDue = parseFloat(total) - parseFloat( amountPaid );
    $('.amountDue').val( amountDue.toFixed() );
  }else{
    total = parseFloat(total).toFixed();
    $('.amountDue').val( total );
  }
}


//It restrict the non-numbers
var specialKeys = new Array();
specialKeys.push(8,46); //Backspace
function IsNumeric(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    console.log( keyCode );
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}
</script>
@endsection