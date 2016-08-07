@extends('layouts.master')

@section('run_custom_css_file')
  <link href="{{ asset('styles/magicsuggest-min.css') }}" rel="stylesheet">
@endsection

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
          Add New Employee
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
          
      

      <form class="form-inline invoice-form">
        <div class="invoice-cls">
            <div class="delete_parent">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
              </div>
              <button type="button" class="btn btn-danger delete">Delete</button>
              <div class="clearfix"></div>
            </div>
        </div>
        <div class="invoice-append"></div>
        <button type="button" class="btn btn-info addMore">Add More</button>
      </form>

          <input type="text" class="calculate" id="first" />
          <input type="text" class="calculate" id="second"/>
          <input type="text" id="third"/>

            <div class="clearfix"></div>
            <div id="ms-allowFreeEntries"></div>

            <button type="button" class="btn btn-primary apibutton">Go</button>
            <div class="patient_name">

            </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /main area -->
</div>

@endsection

@section("run_custom_js_file")
    <script src="{{ asset('scripts/magicsuggest-min.js') }}"></script>
@endsection

@section('run_custom_jquery')
    <script type="text/javascript">
      $( document ).ready(function() {

      $('#ms-allowFreeEntries').magicSuggest({
          allowFreeEntries: false,
          data: ['Paris', 'New York', 'Gotham']
      });

    $(".addMore").click(function(){
    var invoice_form = $(".invoice-cls").children().clone();
    $(".invoice-append").append(invoice_form);
    });

    $( '.invoice-form' ).on( 'click', '.delete', function () {
    $(this).parent().remove();
    });

    $(".calculate").keyup(function(){
      var first_val = $("#first").val();
      var second_val = $("#second").val();
      if(first_val != "" && second_val != "") {
        $("#third").val(parseInt(first_val) + parseInt(second_val));
      } else {
        $("#third").val("");
      }
    });
      $(".apibutton").click(function(){
          var first_val = $("#first").val();
          var second_val = $("#second").val();
          $.getJSON("/hospital/public/api/operationtype_create?name="+first_val+"&cost="+second_val, function(result){
              $(".patient_name").text(result.status);
          });
      });

    });
    </script>
@endsection