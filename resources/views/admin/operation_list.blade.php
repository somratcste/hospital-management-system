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
              <th>Operation Name</th>
              <th>View</th>
              @if(Auth::user()->operation_edit_id == 1)
              <th>Edit</th>
              @endif
              @if(Auth::user()->operation_delete_id == 1)
              <th>Delete</th>
              @endif
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Operation Name</th>
              <th>View</th>
              @if(Auth::user()->operation_edit_id == 1)
              <th>Edit</th>
              @endif
              @if(Auth::user()->operation_delete_id == 1)
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
              <td>{{ $operation->operationtype->name }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Details</button></a></td>
              <div class="modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Operation's Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>Operation Name</p>
                          <p>Patient Name</p>
                          <p>Patient ID</p>
                          <p>Selected Doctor</p>
                          <p>O.T Date / Time</p>
                          <p>O.T Charge</p>                
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $operation->operationtype->name or 'T4' }}</p>
                          <p> : {{ $operation->patient->name or 'Somrat' }}</p>
                          <p> : {{ $operation->patient->id }}</p>
                          <P> : {{ $operation->doctor->name or 'Mr. Nazmul' }}</P>
                          <p> : {{ $operation->dateTime or '2016:20:06' }}</p>
                          <p> : {{ $operation->operationtype->cost or '2000' }} Tk.</p>                       
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer no-border">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              
              @if(Auth::user()->operation_edit_id == 1)
              <td><a data-toggle="modal" data-target="#edit<?php echo $i; ?>" href=""><button type="button" class="btn btn-info">Edit</button></a></td>
              @endif
              <div class="modal" id="edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Edit Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row mb25">
                      <form class="form-horizontal bordered-group" role="form" action="{{ route('operation.update') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-3 control-label">Patient</label>
              <div class="col-sm-8">    
                <input class="form-control" type="text" value="{{ $operation->patient->name }}" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Operation Type</label>
              <div class="col-sm-8">
                <select class="form-control" name="operationType_id">
                @foreach($operationtypes as $operationtype)
                  <option value="{{ $operationtype->id }}" {{ $operation->operation_type_id == $operationtype->id ? 'selected' : '' }}>{{ $operationtype->name }}</option>
                @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Select Doctor</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">
                @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id }}" {{ $operation->doctor_id == $doctor->id ? 'selected' : ''}}>{{ $doctor->name }}</option>
                @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">O.T Date / Time</label>
              <div class="col-sm-8">
                <input type="text" name="dateTime" value="{{ $operation->dateTime }}" class="form-control">
              </div>
            </div>
            
            <div class="modal-footer no-border clear">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <input type="hidden" name="operation_id" value="{{ $operation->id }}">
            </div>
                  </div>
                </div>
              </div>
               </form>
              

              @if(Auth::user()->operation_delete_id == 1)
              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
              @endif
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete Operations Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                  <form action="{{ route('operation.delete') }}" method="">
                  <div class="modal-footer no-border">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <input type="hidden" name="operation_id" value="{{ $operation->id }}">
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