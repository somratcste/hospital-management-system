@extends('layouts.master')

@section('top_header')
  View All Invoice
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          invoices Information
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
              <th>No.</th>
              <th>P. Name</th>
              <th>P. ID</th>
              <th>View</th>
              <th>Print</th>
              <th>Edit</th>
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>P. Name</th>
              <th>P. ID</th>
              <th>View</th>
              <th>Print</th>
              <th>Edit</th>
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($invoices as $invoice)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $invoice->patient->name }}</td>
              <td>{{ $invoice->patient->id}}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Details</button></a></td>
              <div class="modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Invoice Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row mb25">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
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
                        <div class="col-xs-7">
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
                    <div class="modal-footer no-border">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <td>
                <form action="{{ route('invoice.view') }}" method="GET">
                  {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                <button class="btn btn-primary">Print</button>
                </form>
              </td>
              @if($invoice->total != $invoice->receive_cash)
              <td><a data-toggle="modal" data-target="#edit<?php echo $i; ?>" href=""><button type="button" class="btn btn-info">Edit</button></a></td>
              @else
                <td><button type="button" class="btn btn-info">Paid</button></td>
              @endif
              <div class="modal" id="edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Edit Information</h4>
                    </div>
            <div class="modal-body">
            <form class="form-horizontal bordered-group" role="form" action="{{ route('invoice.update' , $invoice->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <input name="_method" type="hidden" value="Put">

      <div class="form-group clear"></div>
      <div class="row">
      <div class="form-group form-inline">
        <label class="col-sm-4" >Subtotal: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input type="number" class="form-control" id="subTotal" value="{{ $invoice->total_amount }}" readonly>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Percent: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="percent" type="number" class="form-control" id="tax" placeholder="Percent" required>
              <div class="input-group-addon">%</div>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Percent Amount: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="percent_amount" type="text" class="form-control" id="taxAmount" required>          
        </div>
      </div>

      <div class="form-group form-inline">
        <label class="col-sm-4">Total Amount: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="total_amount" type="text" class="form-control" id="totalAftertax"  required>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Discount Amount: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="discount" type="number" class="form-control" value="0" id="discount" required>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4"><button type="button" id="total" class="btn btn-primary">Total</button></label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="total" type="number" class="form-control" id="totalAmount" value="{{ $invoice->total}}" required>
        </div>
      </div>

      <div class="form-group form-inline">
        <label class="col-sm-4">Receive Cash: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="receive_cash" type="number" class="form-control" required>
        </div>
      </div>

        </div>
        </div>
        <div class="modal-footer no-border clear">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      
    </div>
  </div>
   </form>
              

              @if(Auth::user()->super_id == 1)
              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
              @endif
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete invoices Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ? 
                  </div>
                  <form action="{{ route('invoice.destroy' , $invoice->id)}}" method="POST">
                  <input name="_method" type="hidden" value="DELETE">
                  {{ csrf_field() }}

                  <div class="modal-footer no-border">
                      <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                      <button type="submit" class="btn btn-primary">Yes</button>
                  </div>
                  </form>
                </div>
              </div>
              </div>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
        <section>
        <nav>
          <ul class="pager">
              @if($invoices->currentPage() !== 1)
                <li class="previous"><a href="{{ $invoices->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($invoices->currentPage() !== $invoices->lastPage() && $invoices->hasPages())
                <li class="next"><a href="{{ $invoices->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
              @endif
          </ul>
        </nav>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection


@section('run_custom_jquery')
<script type="text/javascript">
  $(document ).ready(function() {
    

    $("#total").click(function() {

      $("#taxAmount").val(function() {
        var result = (parseFloat($("#tax").val()) *  parseFloat($("#subTotal").val()) / 100).toFixed(2)
        if(!isFinite(result)) result = 0 ;
        return result;
      });

      $("#totalAftertax").val(function() {
        var result = (parseFloat($("#subTotal").val()) - parseFloat($("#taxAmount").val())).toFixed(2);
        if(!isFinite(result)) result = 0 ;
        return result;
      });

      $("#totalAmount").val(function() {
        var result = (parseFloat($("#subTotal").val()) - parseFloat($("#taxAmount").val()) - parseFloat($("#discount").val())).toFixed();
        if(!isFinite(result)) result = 0 ;
        return result;
      });

    });

});
</script>
@endsection