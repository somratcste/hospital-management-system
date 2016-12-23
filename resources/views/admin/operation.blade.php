@extends('layouts.master')

@section('run_custom_css_file')
  <link rel="stylesheet" href="{{ asset('styles/bootstrap-combined.min.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/bootstrap-datetimepicker.min.css') }}">
  <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
@endsection
@section('top_header')
  Add New Operation
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
          <form class="form-horizontal bordered-group" role="form" action="{{ route('operation.save') }}" method="post">

            <div class="form-group">
              <label class="col-sm-2 control-label">Patient</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_id">
                  <option value="1">Nazmul</option>
                  <option value="2">Somrat</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Operation Type</label>
              <div class="col-sm-8">
                <select class="form-control" name="operationType_id">
                @foreach($operationtypes as $operationtype)
                  <option value="{{ $operationtype->id }}">{{ $operationtype->name }}</option>
                @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Select Doctor</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">
                @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
                </select>
              </div>
            </div>

            <div class="form-group input-append" id="datetimepicker2">
              <label class="col-sm-5">Operation Date / Time</label>
              <div class="col-sm-6">
                <input data-format="MM/dd/yyyy HH:mm:ss PP" type="dateTime">
              <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
              </span>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Add Operation</button>
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

@section('run_custom_js_file')
  <script src="{{ asset('scripts/bootstrap-datetimepicker.min.js') }}"></script>
@endsection

@section('run_custom_jquery')
<script type="text/javascript">
  $(function() {
    $('#datetimepicker2').datetimepicker({
      language: 'en',
      pick12HourFormat: true
    });
  });
</script>
@endsection