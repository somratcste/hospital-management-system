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
        <img src="images/logo-dark.png" height="15" alt="">
      </div>
      <!-- /logo -->
    </div>

    <ul class="nav navbar-nav hidden-xs">
      <li>
        <p class="navbar-text">
          Add New Doctor
        </p>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right hidden-xs">

      <li>
        <a href="javascript:;" data-toggle="dropdown">
          <img src="images/avatar.jpg" class="header-avatar img-circle ml10" alt="user" title="user">
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
        <div class="col-lg-12">
          <form class="form-horizontal bordered-group" role="form" action="{{ route('doctor.save') }}" method="post">

            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Request::old('name') }}" required>
              </div>
            </div>
            

            <div class="form-group">
              <label class="col-sm-2 control-label">Degree</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="degree" placeholder="Degree" value="{{ Request::old('degree') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Gender</label>
              <div class="col-sm-8"> 
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio1" value="m"> Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio2" value="f"> Female
                </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Date of Birth</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" data-provide="datepicker" name="birthDate">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Specialization</label>
              <div class="col-sm-8">
                <select class="form-control" name="specialist">
                  <option value="medicine">Medicine</option>
                  <option value="">Orthopedics</option>
                  <option value="">Neurologiest</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Visiting Charge</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="charge" placeholder="visiting charge" value="{{ Request::old('charge') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Mobile Number</label> 
              <div class="col-sm-8">
                <input class="form-control" type="tel" pattern="^\d{11}$" required name="mobile" placeholder="(format: xxxxxxxxxxx)" name="mobile">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Request::old('email') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Home Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="hAddress" placeholder="Home Address" value="{{ Request::old('hAddress') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Office Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="oAddress" placeholder="Office Address" value="{{ Request::old('oAddress') }}" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Add Doctor</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection