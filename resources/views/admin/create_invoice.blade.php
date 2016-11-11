@extends('layouts.master')

@section('run_custom_css_file')
  <link href="{{ asset('styles/magicsuggest-min.css') }}" rel="stylesheet">
@endsection

@section('top_header')
Create New Invoice
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Invoice Creator
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
      
    <form class="form-horizontal bordered-group" role="form" action="{{ route('invoice.create') }}" method="get" enctype="multipart/form-data">

      <div class="form-group">
        <label class="col-sm-2 control-label">Select Patient</label>
        <div class="col-sm-8">
          <select class="form-control" name="patient_id">
            @foreach($patients as $patient)
              <option value="{{ $patient->id}}">{{$patient->id}} -- {{$patient->name}} --
              @if($patient->patient_type == 1)
                Out
              @else 
                Admit
              @endif
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">        
      <label class="col-sm-4"></label>  
      <div class="input-group col-sm-6">
      <input type=submit name="invoice" value="Submit" class="btn btn-success">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
      </div>
     
      </div>
      </form>

      </div>

            


      </div>
      </div>
    </div>
  </div>
  <!-- /main area -->
</div>

@endsection

@section("run_custom_js_file")

@endsection

@section('run_custom_jquery')

@endsection