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
          View All Doctor's
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
          Doctor's Information
        </div>
        <div class="panel-body">
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Specialist</th>
              <th>Mobile No.</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Specialist</th>
              <th>Mobile No.</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($doctors as $doctor)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $doctor->name }}</td>
              <td>{{ $doctor->specialist }}</td>
              <td>{{ $doctor->mobile }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Details</button></a></td>
              <div class="modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Doctor's Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>Name</p>
                          <p>Specialist</p>
                          <p>Visiting Charge</p>
                          <p>Degree</p>
                          <p>Gender</p>
                          <p>Birth Date</p>
                          <p>Mobile Number</p>
                          <p>Email</p>
                          <p>Office Address</p>
                          <p>Home Address</p>
                          <p>Image Preview</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $doctor->name }}</p>
                          <p> : {{ $doctor->specialist }}</p>
                          <p> : {{ $doctor->charge }}</p>
                          <p> : {{ $doctor->degree }}</p>
                          <p> : {{ $doctor->gender }}</p>
                          <p> : {{ $doctor->birthDate }}</p>
                          <p> : {{ $doctor->mobile }}</p>
                          <p> : {{ $doctor->email }}</p>
                          <p> : {{ $doctor->oAddress }}</p>
                          <p> : {{ $doctor->hAddress }}</p>
                          <p> : <img class="img-responsive" src="{{ asset($doctor->image) }}" ></p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer no-border">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <td><a href=""><button type="button" class="btn btn-info">Edit</button></a></td>
              <td>
              <a href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection