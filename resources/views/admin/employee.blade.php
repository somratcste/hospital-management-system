@extends('layouts.master')

@section('top_header')
  Add New Employee
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Employee Information
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
          <form class="form-horizontal bordered-group" role="form" action="{{ route('employee.save') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-2 control-label">Employee Type</label>
              <div class="col-sm-8">
                <select class="form-control" name="ecategory_id">
                  @foreach($ecategorys as $ecategory)
                    <option value="{{ $ecategory->id }}">{{ $ecategory->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

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
                <input type="date" class="form-control" data-provide="datepicker" name="birthDate">
              </div>
            </div>

            <!-- <div class="form-group">
              <label class="col-sm-2 control-label">Specialization</label>
              <div class="col-sm-8">
                <select class="form-control" name="specialist">
                  <option value="1">Other</option>
                  <option value="medicine">Medicine</option>
                  <option value="orthopedics">Orthopedics</option>
                  <option value="neurologiest">Neurologiest</option>
                </select>
              </div>
            </div> -->

            <!-- <div class="form-group">
              <label class="col-sm-2 control-label">Visiting Charge</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="charge" placeholder="visiting charge" value="{{ Request::old('charge') }}">
              </div>
            </div> -->

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
              <label class="col-sm-2 control-label">Upload Image</label>
              <div class="col-sm-8">
                <input type="file" name="image">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Add Employee</button>
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