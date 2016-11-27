@extends('layouts.master')

@section('top_header')
  Add New Name of Report
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Report Name Information
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
          <form class="form-horizontal bordered-group" role="form" action="{{ route('reportType.save') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-2 control-label">Test ID</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="test_id" placeholder="test id" value="{{ Request::old('test_id') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Report Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="Report Name" value="{{ Request::old('name') }}" required>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Report Cost</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="cost">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Discount Percent</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="percent" placeholder="percent" value="{{ Request::old('percent') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Room No.</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="room">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Add Name</button>
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