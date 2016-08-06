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
          Add New Patient
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
          Patient Information
        </div>
        <div class="panel-body">
        <div class="col-lg-12">
        @if(Session::has('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
        @endif
        @if(count($errors) > 0)
        <div>
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
              {{$error}}
            @endforeach
          </ul>
        </div>
      @endif
          <form class="form-horizontal bordered-group" role="form" action="{{ route('patient.save') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-2 control-label">Patient Type</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_type">
                  <option value="1">Out Patient</option>
                  <option value="2">Admit Patient</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Patient ID</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="2" disabled>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Request::old('name') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Gender</label>
              <div class="col-sm-8"> 
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio1" value="Male"> Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio2" value="Female"> Female
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
              <label class="col-sm-2 control-label">Blood Group</label>
              <div class="col-sm-8">
                <select class="form-control" name="bloodGroup">
                  <option value="A+">A+</option>
                  <option value="O+">O+</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Symptoms</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="symptoms" placeholder="Symptoms" value="{{ Request::old('symptoms') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Admit Date</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="date" placeholder="Date" value="{{ Request::old('date') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Admit Time</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="time" placeholder="Time" value="{{ Request::old('time') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Assign Doctor</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">
                  <option value="1">Mr. Nazmul</option>
                  <option value="2">Sanjida Hossain</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Assign Seat</label>
              <div class="col-sm-8">
                <select class="form-control" name="seat_id">
                  <option value="1">202</option>
                  <option value="2">505</option>
                </select>
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
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Request::old('email') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="address" placeholder="Address" value="{{ Request::old('address') }}" required>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Upload Image</label>
              <div class="col-sm-8">
                <input type="file" name="image">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Add Patient</button>
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