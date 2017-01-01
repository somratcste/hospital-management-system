@extends('layouts.master')

@section('top_header')
  View All Operations
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Operation Information
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
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Operation ID</th>
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
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Operation ID</th>
              <th>View</th>
              <th>Edit</th>
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
            </tr>          
            </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($operations as $operation)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $operation->patient->name }}</td>
              <td>{{ $operation->patient->id }}</td>
              <td>{{ $operation->id }}</td>
              <td>
                <form action="{{ route('operation.view') }}" method="GET">
                  {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="operation_id" value="{{ $operation->id }}">
                <button class="btn btn-primary">Print</button>
                </form>
              </td>

              <td>
                <form action="{{ route('operation.get') }}" method="GET">
                  {{ csrf_field() }}
                <input type="hidden" name="operation_id" value="{{ $operation->id }}">
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
                    <h4 class="modal-title">Delete operation's Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                  <form action="{{ route('operation.destroy' , $operation->id)}}" method="POST">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="operation_id" value="{{ $operation->id }}">
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
              @if($operations->currentPage() !== 1)
                <li class="previous"><a href="{{ $operations->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($operations->currentPage() !== $operations->lastPage() && $operations->hasPages())
                <li class="next"><a href="{{ $operations->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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