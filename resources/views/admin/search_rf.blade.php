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
          Search
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
          Find Your ID 
        </div>
      <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
       @endif

     <form action="{{ route('village.create')}}" method="get" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input name="_method" type="hidden" value="GET">

    <div class="form-group clear">
      <label class="col-sm-3 control-label">Marketing Officer</label>
      <div class="col-sm-7">
        <select name="marketing_id" class="form-control" id="marketing" required>
          <option value="">Select Marketig Officer</option>
          @foreach($marketings as $marketing)
            <option value="{{ $marketing->id }}">{{ $marketing->name }}</option>
          @endforeach
        </select>
      </div>
    </div>  


    <div class="form-group clear">
      <label class="col-sm-3 control-label" >Village Doctor : &nbsp;</label>
      <div class="col-sm-7">
        <select name="village_id" id="village" class="form-control" required>
          <option value="">Select Village Doctor</option>
        </select>
      </div>
    </div>  


    <div class="form-group clear">
      <label class="col-sm-3 control-label">Year</label>
      <div class="col-sm-7">
        <select class="form-control" name="year" required>
          <option value="">Select Year</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
        </select>
      </div>
    </div>

    <div class="form-group clear">
      <label class="col-sm-3 control-label">Month</label>
      <div class="col-sm-7">
        <select class="form-control" name="month" required>
        <option value="">Select Month</option>
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
      </div>
    </div>

    <div class="form-group clear">
      <label class="col-sm-3 control-label">Day</label>
      <div class="col-sm-7">
        <select class="form-control" name="day" required>
        <option value="">Select Day</option>
          <option value="01">1</option>
          <option value="02">2</option>
          <option value="03">3</option>
          <option value="04">4</option>
          <option value="05">5</option>
          <option value="06">6</option>
          <option value="07">7</option>
          <option value="08">8</option>
          <option value="09">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        </select>
      </div>
    </div>

  </div>
    <div class="panel-footer" style="overflow: hidden;">
      <div class="col-sm-3"></div>
      <div class="col-sm-7">
       <button type="submit" class="btn btn-info btn-lg btn-block">Search</button>
       </div>
    </div>
    </form>
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