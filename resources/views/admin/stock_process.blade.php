 @extends('layouts.master')

@section('top_header')
  Stock's Information
@endsection

@section('content')

<!-- main area -->
<div class="main-content">

  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Entry or Delivary Item
        </div>
        <form action="{{ route('stock.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
       @endif

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Entry / Delivary</label>
            <div class="col-sm-7">
              <select class="form-control" name="type">            
                  <option value="1">Entry</option>
                  <option value="0">Delivary</option>
              </select>
            </div>
          </div>
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Stock Type</label>
            <div class="col-sm-7">
              <select class="form-control" name="type">            
                  <option value="1">Hospital</option>
                  <option value="0">Lab</option>
              </select>
            </div>
          </div>
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="name" id="searchname" required>
            </div>
          </div>      
         
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Quantity</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="quantity" id="quantity" required>
            </div>
          </div>
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="address" required>
            </div>
          </div>

        </div>
        <div class="panel-footer" style="overflow: hidden;">
          <button type="submit" class="btn btn-success pull-right">Save</button>
        </div>
        </form>
    </div>
  </div>

  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection

@section('run_custom_jquery')

<script type="text/javascript">
  $('#searchname').autocomplete({
    source : '{!!URL::route('autocomplete')!!}',
    minlenght:1,
    autoFocus:true,
    select : function(e,ui){
      $('#quantity').val(ui.item.quantity);
    }
  });
</script>

@endsection