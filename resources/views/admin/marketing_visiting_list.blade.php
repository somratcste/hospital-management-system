@extends('layouts.master')

@section('top_header')
  View All Reports
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Report List on {{ $marketing->name }}
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
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>S. No</th>
              <th>Date</th>
              <th>Report ID</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S. No</th>
              <th>Date</th>
              <th>Report ID</th>
              <th>Amount</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @php 
              $subtotal = 0
            @endphp
            @foreach ($invoiceouts as $invoiceout)
            <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $invoiceout->created_at->format('m-d-Y')}}</td>
              <td>{{ $invoiceout->id }}</td>
              <td>{{ $invoiceout->subtotal}} /-</td>
            </tr>
            <?php $i++; ?>
            @php 
              $subtotal += $invoiceout->subtotal 
            @endphp

            @endforeach
          </tbody>
        </table>
        <hr/>
      <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6">
           <table class="table table-bordered table-hover">
           <tbody>
              <thead>
                <th>Description</th>
                <th>Amount</th>
              </thead>
              <tr>
                <td>Total</td>
                <td>{{ $subtotal }} Tk.</td>
              </tr>
          </tbody>
          </table>
        </div>
      </div>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection