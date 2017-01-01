@extends('layouts.master')

@section('top_header')
  View All Paid Report
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          View All PAID Report List
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
              <th>P. ID</th>
              <th>View</th>
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
              <td>{{ $invoiceout->patient_id }}-{{ $invoiceout->created_at->format('m-d-Y')}}</td>
              <td>
                <form action="{{ route('invoiceout.view') }}" method="GET">
                  {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="invoiceout_id" value="{{ $invoiceout->id }}">
                <button class="btn btn-primary">Print</button>
                </form>
              </td>
              
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