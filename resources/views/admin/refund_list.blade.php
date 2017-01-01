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
          View All Refund List
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
              <th>Patient ID</th>
              <th>View</th>
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Patient ID</th>
              <th>View</th>
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($refunds as $refund)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $refund->invoice_out_id}}</td>
              <td>{{ $refund->invoiceOut->patient_id}}-{{$refund->invoiceOut->created_at->format('m-d-Y')}}</td>
              @if(Auth::user()->super_id == 1)
              <td>
                <form action="{{ route('refund.create') }}" method="GET">
                  {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="refund_id" value="{{ $refund->id }}">
                <button class="btn btn-primary">Print</button>
                </form>
              </td>

              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
              @endif
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete Refund Report's </h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                  <form action="{{ route('refund.destroy' , $refund->id)}}" method="POST">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="report_id" value="{{ $refund->report_id }}">
                  <input type="hidden" name="refund_id" value="{{ $refund->id }}">
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
              @if($refunds->currentPage() !== 1)
                <li class="previous"><a href="{{ $refunds->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($refunds->currentPage() !== $refunds->lastPage() && $refunds->hasPages())
                <li class="next"><a href="{{ $refunds->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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