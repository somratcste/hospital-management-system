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
          Add New Report
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
          Report Entry Information
        </div>
        <form action="" method="POST">
        {{ csrf_field() }}
        <div class="panel-body">
        @if(Session::has('success1'))
        <div class="alert alert-success">
          {{Session::get('success1')}}
        </div>
       @endif
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Report ID</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Select Patient</label>
            <div class="col-sm-7">
              <select class="form-control" name="patientout_id">
                <option value="">Select Patient</option>
                @foreach($patientouts as $patientout)
                  <option value="{{ $patientout->id }}">{{ $patientout->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Visiting Doctor</label>
            <div class="col-sm-7">
              <select class="form-control" name="doctor_id">
                <option value="">Select Doctor</option>
                @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Marketing Officer</label>
            <div class="col-sm-7">
              <select name="marketing_id" class="form-control" id="marketing">
                <option value="">Select Marketig Officer</option>
                @foreach($marketings as $marketing)
                  <option value="{{ $marketing->id }}">{{ $marketing->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Village Doctor</label>
            <div class="col-sm-7">
              <select name="village_id" id="village" class="form-control">
                <option value="">Select Village Doctor</option>
              </select>
            </div>
          </div>

  


        </div>
        <div class="panel-footer" style="overflow: hidden;">
          <button type="submit" class="btn btn-success pull-right">Save</button>
        </div>
        </form>
    </div>
  </div>

  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection
@section('run_custom_jquery')
<script type="text/javascript">
  $('#marketing').on('change' , function(e){
    var marketing_id = e.target.value;

    $.get('/hospital/public/reportout_village?marketing_id=' + marketing_id, function(data){
      $('#village').empty();
      $.each(data, function(index,villageobj){
        $('#village').append('<option value="'+villageobj.id+'">'+villageobj.name+'</option>')
      });
    });
  });
</script>
@endsection