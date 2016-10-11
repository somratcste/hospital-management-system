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
          View All Report's
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
          Report List on {{ $village->name }} at 
          {{ $day }}
          @if($month==01)January
          @elseif($month==02)February
          @elseif($month==03)March
          @elseif($month==04)April
          @elseif($month==05)May
          @elseif($month==06)June
          @elseif($month==07)July
          @elseif($month==08)August
          @elseif($month==09)September
          @elseif($month==10)October
          @elseif($month==11)November
          @elseif($month==12)December
          @endif
          {{ $year }}
          
        </div>
        <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
      @endif
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>S. No</th>
              <th>Report ID</th>
              <th>Total</th>
              <th>Hospital</th>
              <th>Less</th>
              <th>Pay</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S. No</th>
              <th>Report ID</th>
              <th>Total</th>
              <th>Hospital</th>
              <th>Less</th>
              <th>Pay</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @php 
              $subtotal = 0
            @endphp
            @php
              $hospital = 0
            @endphp
            @php
              $less = 0
            @endphp
            @php
              $pay = 0
            @endphp
            @foreach ($invoiceouts as $invoiceout)
            <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $invoiceout->id }}</td>
              <td>{{ $invoiceout->subtotal}}</td>
              <td>{{ $invoiceout->subtotal / 2}}</td>
              <td>{{ $invoiceout->percent_amount + $invoiceout->discount }}</td>
              <td>{{ ($invoiceout->subtotal / 2) - ($invoiceout->percent_amount + $invoiceout->discount) }}</td>
            </tr>
            <?php $i++; ?>
            @php 
              $subtotal += $invoiceout->subtotal 
            @endphp
            @php 
              $hospital += $invoiceout->subtotal / 2 
            @endphp
            @php 
              $less += $invoiceout->percent_amount + $invoiceout->discount
            @endphp
            @php 
              $pay += ($invoiceout->subtotal / 2) - ($invoiceout->percent_amount + $invoiceout->discount)
            @endphp

            @endforeach
            {{ $subtotal }} {{ $hospital }} {{ $less }} {{ $pay }}
          </tbody>
        </table>
        <section>
        <nav>
          <ul class="pager">
              @if($invoiceouts->currentPage() !== 1)
                <li class="previous"><a href="{{ $invoiceouts->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($invoiceouts->currentPage() !== $invoiceouts->lastPage() && $invoiceouts->hasPages())
                <li class="next"><a href="{{ $invoiceouts->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
              @endif
          </ul>
        </nav>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection