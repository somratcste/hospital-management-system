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
      <label class="col-sm-4" >Patient ID: &nbsp;</label>
      <div class="input-group col-sm-6">
        <input name="patient_id" type="number" class="form-control" required >
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

  
  <!-- <div class="box-body">
   <div class="table-responsive">  
   
    <table id="invoice_bill" class="table table-bordered table-hover">
     <thead>
      <tr>
        <th width="5%">No.</th>
        <th width="15%">Test ID</th>
        <th width="40%">Test Name</th>
        <th width="15%">Room No.</th>
        <th width="20%">Price</th>
        <th width="5%">Delete</th>
      </tr>
      </thead>

      <tbody class="body">
        <tr>
          <td style="text-align: center;">1</td>
          <td><input type="text" name="testId[]" id="testId" class="testId form-control"></td>
          <td><input type="text" name="testName[]" id="testName" class="testName form-control"></td>
          <td><input type="number" name="room[]" id="room" class="room form-control"></td>
          <td><input type="number" name="price[]" id="price" class="price form-control"></td>
          <td style="font-size: 25px;text-align: center;color: red;"><a href="#" class="delete">X</a></td>
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
      </div> box body --> 


      <div class="box-body">
                 <div class="table-responsive">  
                 
                  <table id="invoice_bill" class="table table-bordered table-hover">
                    <thead>
                        <tr>
              <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
              <th width="13%">Test ID</th>
              <th width="33%">Test Name</th>
              <th width="13%">Room No.</th>
              <th width="13%">Price</th>
            </tr>
                    </thead>

                    <tbody>
                      <tr>
              <td><input class="case" type="checkbox"/></td>
              <td><input type="text" data-type="id" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
              <td><input type="text" data-type="name" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
              <td><input type="text" data-type="room" name="itemAvailable[]" id="itemAvailable_1" class="form-control autocomplete_txt" autocomplete="off"></td>
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


<!-- <script type="text/javascript">
  $('#testName').autocomplete({
    source : 'http://localhost/hospital/public/autocomplete',
    minLength: 0,
    autoFocus:true,
    select:function(e,ui){
      $('#testId').val(ui.item.id);
      $('#price').val(ui.item.cost);
      $('#room').val(ui.item.room);
    }
  });
</script> -->

<!-- <script type="text/javascript">
$(document).ready(function(){
  $('.addmore').click(function(){
    var n = ($('.body tr').length-0)+1;
    var tr = '<tr>' +
          '<td style="text-align: center;">'+n+'</td>'+
          '<td><input type="text" name="testId[]" id="testId" class="testId form-control"></td>'+
          '<td><input type="text" name="testName[]" id="testName" class="testName form-control"></td>'+
          '<td><input type="number" name="room[]" id="room" class="room form-control"></td>'+
          '<td><input type="number" name="price[]" id="price" class="price form-control"></td>'+
          '<td style="font-size: 25px;text-align: center;color: red;"><a href="#" class="delete">X</a></td></tr>';

    $('.body').append(tr);
  });

  $('.body').delegate('.delete' , 'click' , function(){
    $(this).parent().parent().remove();
  });
});



</script> -->

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
  html += '<td><input type="text" data-type="id" name="itemNo[]" id="itemNo_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
  html += '<td><input type="text" data-type="name" name="itemName[]" id="itemName_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
  html += '<td><input type="text" data-type="productAvailable" name="itemAvailable[]" id="itemAvailable_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
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
  
  if(type =='id' )autoTypeNo=0;
  if(type =='name' )autoTypeNo=1;  
  
  $(this).autocomplete({
    source: function( request, response ) {
      $.ajax({
        url : 'http://localhost/hospital/resources/views/admin/ajax.php',
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
      $('#total_'+id[1]).val(names[3] );
      calculateTotal();
    }           
  });
});

//price change
$(document).on('change keyup blur','.changesNo',function(){
  id_arr = $(this).attr('id');
  id = id_arr.split("_");
  price = $('#price_'+id[1]).val();
  if(price !='' ) $('#total_'+id[1]).val(parseFloat(price).toFixed(2) ); 
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