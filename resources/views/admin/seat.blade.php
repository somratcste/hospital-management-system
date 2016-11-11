@extends('layouts.master')

@section('top_header')
  Add New Seat
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
          <form class="form-horizontal bordered-group" role="form" action="{{ route('seat.save') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-2 control-label">Seat No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="seatNo" placeholder="Seat No" value="{{ Request::old('seatNo') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Floor No.</label>
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
              <label class="col-sm-2 control-label">Rent/day</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" data-provide="datepicker" name="rent">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-8">
                <select class="form-control" name="status">
                  <option value="empty">Empty</option>
                  <option value="full">Full</option>
                </select>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Type</label>
              <div class="col-sm-8"> 
                <label class="radio-inline">
                  <input type="radio" name="seatType" id="inlineRadio1" value="general"> General
                </label>
                <label class="radio-inline">
                  <input type="radio" name="seatType" id="inlineRadio2" value="cabin"> Cabin
                </label>
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
                <button type="submit" class="btn btn-success">Add Seat</button>
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