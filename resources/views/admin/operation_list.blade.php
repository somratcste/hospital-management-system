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
          View All Operation's
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
              <th>operation Name</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>operation Name</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>          
            </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($operations as $operation)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $operation->operationNo or 'T4' }}</td>
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
                          <p>Selected Doctor</p>
                          <p>Selected Seat</p>
                          <p>O.T Date</p>
                          <p>O.T Time</p>
                          <p>O.T Charge</p>
                          <p>Description</p>                 
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $operation->name or 'T4' }}</p>
                          <p> : {{ $operation->patien or 'Somrat' }}</p>
                          <P> : {{ $operation->doctor or 'Mr. Nazmul' }}</P>
                          <p> : {{ $operation->seat or '102' }}</p>
                          <p> : {{ $operation->date or '2016:20:06' }}</p>
                          <p> : {{ $operation->time or '05:06:20' }}</p>
                          <p> : {{ $operation->charge or '2000' }}</p>
                          <p> : {{ $operation->description }}</p>                         
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer no-border">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <td><a data-toggle="modal" data-target="#edit<?php echo $i; ?>" href=""><button type="button" class="btn btn-info">Edit</button></a></td>
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
                <select class="form-control" name="patient_id">
                  <option value="1">Nazmul</option>
                  <option value="2">Somrat</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Operation Type</label>
              <div class="col-sm-8">
                <select class="form-control" name="operationType_id">
                  <option value="1">T4</option>
                  <option value="2">C.B.C</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Select Doctor</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">
                  <option value="1">T4</option>
                  <option value="2">C.B.C</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Select Seat</label>
              <div class="col-sm-8">
                <select class="form-control" name="seat_id">
                  <option value="1">ICU - 101</option>
                  <option value="2">ICU - 202</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">O.T Date</label>
              <div class="col-sm-8">
                <input type="text" name="date" class="form-control" placeholder="Format : Y-M-D">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">O.T Time</label>
              <div class="col-sm-8">
                <input type="text" name="time" class="form-control" placeholder="Format : H:M:S">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Description</label>
              <div class="col-sm-8">
                <textarea class="form-control" rows="5" name="description"></textarea>
              </div>
            </div>
            
            <div class="modal-footer no-border mt25">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <input type="hidden" name="operation_id" value="{{ $operation->id }}">
            </div>
                  </div>
                </div>
              </div>
               </form>
              

              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
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