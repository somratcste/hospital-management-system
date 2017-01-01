@extends('layouts.master')

@section('top_header')
  View All Report
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          View All DUE Report List
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
              <th>Report ID</th>
              <th>P. ID</th>
              <th>Price Update</th>
              <th>View</th>
              @if(Auth::user()->refund_id == 1)
              <th>Refund</th>
              @endif
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>P. ID</th>
              <th>Price Update</th>
              <th>View</th>
              @if(Auth::user()->refund_id == 1)
              <th>Refund</th>
              @endif
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($invoiceouts as $invoiceout)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $invoiceout->id}}</td>
              <td>{{ $invoiceout->patient_id }} - {{ $invoiceout->created_at->format('m-d-Y') }}</td>
              <td><a data-toggle="modal" data-target="#edit<?php echo $i; ?>" href=""><button type="button" class="btn btn-info">Edit</button></a></td>
              <div class="modal" id="edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Edit Information</h4>
                </div>
            <div class="modal-body">
            <form class="form-horizontal bordered-group" role="form" action="{{ route('invoiceout.update' , $invoiceout->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <input name="_method" type="hidden" value="Put">

            <div class="form-group clear"></div>
            <div class="row">

            
         
          

            <div class="form-group form-inline">
              <label class="col-sm-4">Total Amount: &nbsp;</label>
              <div class="input-group col-sm-6">
                <div class="input-group-addon">Tk.</div>
                <input name="discount" type="number" class="form-control" id="discount" value="{{ $invoiceout->total}}" disabled>
              </div>
            </div>

            <div class="form-group form-inline">
              <label class="col-sm-4">Paid: &nbsp;</label>
              <div class="input-group col-sm-6">
                <div class="input-group-addon">Tk.</div>
                <input name="discount" type="number" class="form-control" id="discount" value="{{ $invoiceout->receive_cash}}" disabled>
              </div>
            </div>

            <div class="form-group form-inline">
              <label class="col-sm-4">Due Amount: &nbsp;</label>
              <div class="input-group col-sm-6">
                <div class="input-group-addon">Tk.</div>
                <input name="discount" type="number" class="form-control" id="discount" value="{{ $invoiceout->due}}" disabled>
              </div>
            </div>

            <div class="form-group form-inline">
              <label class="col-sm-4">Receive Cash: &nbsp;</label>
              <div class="input-group col-sm-6">
                <div class="input-group-addon">Tk.</div>
                <input name="receive_cash" type="number" class="form-control" id="discount" required>
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
              <td>
                <form action="{{ route('invoiceout.view') }}" method="GET">
                  {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="invoiceout_id" value="{{ $invoiceout->id }}">
                <button class="btn btn-primary">Print</button>
                </form>
              </td>
              
              @if(Auth::user()->refund_id == 1)
              <td>
                <form action="{{ route('invoiceout.refund') }}" method="GET">
                  {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="invoiceout_id" value="{{ $invoiceout->id }}">
                <button class="btn btn-primary">Refund</button>
                </form>
              </td>
              @endif
              @if(Auth::user()->super_id == 1)

              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
              @endif
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete Report's Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                  <form action="{{ route('invoiceout.destroy' , $invoiceout->id)}}" method="POST">
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
              @if($invoiceouts->currentPage() !== 1)
                <li class="previous"><a href="{{ $invoiceouts->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($invoiceouts->currentPage() !== $invoiceouts->lastPage() && $invoiceouts->hasPages())
                <li class="next"><a href="{{ $invoiceouts->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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

@endsection