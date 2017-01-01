@extends('layouts.master')

@section('top_header')
  View All Reports
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Report Information
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
              <th>Report Name</th>
              <th>Report ID</th>
              <th>View</th>
              <th>Edit</th>
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report Name</th>
              <th>Report ID</th>
              <th>View</th>
              <th>Edit</th>
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
            </tr>          
            </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($reports as $report)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $report->patient->name }}</td>
              <td>{{ $report->id }}</td>
              <td>
                <form action="{{ route('report.view') }}" method="GET">
                  {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="report_id" value="{{ $report->id }}">
                <button class="btn btn-primary">Print</button>
                </form>
              </td>

              <td>
                <form action="{{ route('report.get') }}" method="GET">
                  {{ csrf_field() }}
                <input type="hidden" name="report_id" value="{{ $report->id }}">
                <button class="btn btn-primary">Edit</button>
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
                  <form action="{{ route('report.destroy' , $report->id)}}" method="POST">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="report_id" value="{{ $report->id }}">
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
              @if($reports->currentPage() !== 1)
                <li class="previous"><a href="{{ $reports->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($reports->currentPage() !== $reports->lastPage() && $reports->hasPages())
                <li class="next"><a href="{{ $reports->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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