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
          View All Seat's
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
          Seat Information
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
              <th>Seat No.</th>
              <th>Status</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Seat No.</th>
              <th>Status</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($seats as $seat)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $seat->seatNo }}</td>
              <td>{{ $seat->status }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Details</button></a></td>
              <div class="modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">seat's Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>Seat No.</p>
                          <p>Floor No.</p>
                          <p>Rent/day</p>
                          <p>Type</p>
                          <p>Status</p>
                          <p>Image Preview</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $seat->seatNo }}</p>
                          <p> : {{ ucfirst($seat->seatFloor) }}</p>
                          <p> : {{ $seat->rent }}</p>
                          <p> : {{ $seat->type }}</p>
                          <p> : {{ $seat->status }}</p>
                          <p> : <img class="img-responsive" src="{{ asset('images/seats/'.$seat->image) }}" ></p>
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
                      <form class="form-horizontal bordered-group" role="form" action="{{ route('seat.update') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-3 control-label">Seat No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="seatNo" placeholder="Seat No" value="{{ Request::old('seatNo') ? Request::old('seatNo') : isset($seat) ? $seat->seatNo : '' }} " required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Floor No.</label>
              <div class="col-sm-8">
                <select class="form-control" name="seatFloor">
                  <option value="1">1st Floor</option>
                  <option value="2">2nd Floor</option>
                  <option value="3">3rd Floor</option>
                  <option value="4">4th Floor</option>
                  <option value="5">5th Floor</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Rent/day</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="rent" value="{{ Request::old('rent') ? Request::old('rent') : isset($seat) ? $seat->rent : '' }} ">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Status</label>
              <div class="col-sm-8">
                <select class="form-control" name="status">
                  <option value="empty" {{ $seat->status == 'empty' ? 'selected' : ''}}>Empty</option>
                  <option value="full" {{ $seat->status == 'full' ? 'selected' : ''}}>Full</option>
                </select>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Type</label>
              <div class="col-sm-8"> 
                <label class="radio-inline">
                  <input type="radio" name="seatType" id="inlineRadio1" value="general" {{ $seat->seatType == 'general' ? 'checked' : ''}}> General
                </label>
                <label class="radio-inline">
                  <input type="radio" name="seatType" id="inlineRadio2" value="cabin" {{ $seat->seatType == 'cabin' ? 'checked' : ''}}> Cabin
                </label>
              </div>
            </div>


            <div class="form-group clear">
              <label class="col-sm-3 control-label">Previous Image</label>
              <div class="col-sm-8">
                <img src="{{ asset('images/seats/'.$seat->image) }}" class="img-responsive" alt="">
                <input class="mt25" type="file" name="image">
              </div>
            </div>

            <div class="modal-footer no-border">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <input type="hidden" name="seat_id" value="{{ $seat->id }}">
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
                    <h4 class="modal-title">Delete seats Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                  <form action="{{ route('seat.delete') }}" method="">
                  <div class="modal-footer no-border">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <input type="hidden" name="seat_id" value="{{ $seat->id }}">
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
              @if($seats->currentPage() !== 1)
                <li class="previous"><a href="{{ $seats->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($seats->currentPage() !== $seats->lastPage() && $seats->hasPages())
                <li class="next"><a href="{{ $seats->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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