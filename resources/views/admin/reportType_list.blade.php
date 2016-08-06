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
          View All Report Name
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
          The Name all the type of Report
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
              <th>Name</th>
              <th>cost</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>cost</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>         
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($reportTypes as $reportType)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $reportType->name }}</td>
              <td>{{ $reportType->cost }}</td>
              
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
                      <form class="form-horizontal bordered-group" role="form" action="{{ route('reportType.update') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-3 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="reportType No" value="{{ Request::old('name') ? Request::old('reportTypeNo') : isset($reportType) ? $reportType->name : '' }} " required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Cost</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="cost" value="{{ Request::old('cost') ? Request::old('cost') : isset($reportType) ? $reportType->cost : '' }} ">
              </div>
            </div>

            <div class="modal-footer no-border">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <input type="hidden" name="reportType_id" value="{{ $reportType->id }}">
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
                    <h4 class="modal-title">Delete the name of Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                  <form action="{{ route('reportType.delete') }}" method="">
                  <div class="modal-footer no-border">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <input type="hidden" name="reportType_id" value="{{ $reportType->id }}">
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
              @if($reportTypes->currentPage() !== 1)
                <li class="previous"><a href="{{ $reportTypes->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($reportTypes->currentPage() !== $reportTypes->lastPage() && $reportTypes->hasPages())
                <li class="next"><a href="{{ $reportTypes->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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