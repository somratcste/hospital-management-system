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
          View Patient Details
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
        	Serial No :- {{ $serial }}
        </div>
        <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
      @endif

      <div class="table-responsive">
        <div class="col-md-6 col-md-offset-3">
        <table class="table table-bordered table-striped mb0">
          <tbody>
              <tr>
              	<td>Patient ID</td>
              	<td>{{ $patient->id }}</td>
              </tr>
              <tr>
              	<td>Patient Name</td>
              	<td>{{ $patient->name }}</td>
              </tr>
              <tr>
              	<td>Selected Doctor</td>
              	<td>{{ $doctor->name }}</td>
              </tr>
              <tr>
              	<td>Visiting Charge</td>
              	<td>{{ $doctor->charge }}</td>
              </tr>
              <tr>
              	<td>Date/Time</td>
              	<td>{{ $date }}</td>
              </tr>
          </tbody>
        </table>
        </div>
      </div>

      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection