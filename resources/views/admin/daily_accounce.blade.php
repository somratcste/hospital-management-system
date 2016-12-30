 @extends('layouts.master')

@section('top_header')
  Accounce Cost Information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <!--Daily Outdoor Income start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Daily Outdoor Income on {{ $date }}
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
              <th>No.</th>
              <th>Invoice ID</th>
              <th>Taka</th>
              <th>User</th>
            </tr>
          </thead>
          @php 
            $totalOutdoorIncome = 0
          @endphp
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($outdoor_incomes as $outdoor_income)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $outdoor_income->invoice_out_id }}</td>
              <td>{{ $outdoor_income->taka }} /-</td>
              <td style="text-transform: capitalize;">{{ $outdoor_income->user->name}}</td>
                  @php 
                  $totalOutdoorIncome = $outdoor_income->taka+ $totalOutdoorIncome @endphp                         
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalOutdoorIncome}} Tk.</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!--Daily Outdoor Income end -->


  <!--Daily indoor Income start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Daily Indoor Income on {{ $date }}
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
              <th>No.</th>
              <th>Invoice ID</th>
              <th>Taka</th>
              <th>User</th>
            </tr>
          </thead>
          @php 
            $totalIndoorIncome = 0
          @endphp
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($indoor_incomes as $indoor_income)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $indoor_income->report_id }}</td>
              <td>{{ $indoor_income->taka }} /-</td>
              <td style="text-transform: capitalize;">{{ $indoor_income->user->name}}</td>
                  @php 
                  $totalIndoorIncome = $indoor_income->taka+ $totalIndoorIncome @endphp                         
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalIndoorIncome}} Tk.</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!--Daily indoor Income end -->

  <!--Daily Indoor Patient Income start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Daily Indoor Patient Income on {{ $date }}
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
              <th>No.</th>
              <th>Invoice ID</th>
              <th>Taka</th>
              <th>User</th>
            </tr>
          </thead>
          @php 
            $totalIndoorPatientIncome = 0
          @endphp
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($indoor_patient_incomes as $indoor_patient_income)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $indoor_patient_income->report_id }}</td>
              <td>{{ $indoor_patient_income->taka }} /-</td>
              <td style="text-transform: capitalize;">{{ $indoor_patient_income->user->name}}</td>
                  @php 
                  $totalIndoorPatientIncome = $indoor_patient_income->taka+ $totalIndoorPatientIncome @endphp                         
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalIndoorPatientIncome}} Tk.</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!--Daily Indoor Patient Income end -->


<!--Daily cost in accounce start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Daily Accounce Cost on {{ $date }}
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
              <th>No.</th>
              <th>Particular</th>
              <th>Taka</th>
            </tr>
          </thead>
          @php 
            $totalCost = 0
          @endphp
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($accounce_costs as $accounce_cost)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $accounce_cost->name }}</td>
              <td>{{ $accounce_cost->taka }} /-</td> 
                  @php 
                  $totalCost = $accounce_cost->taka+ $totalCost @endphp                         
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalCost }} Tk.</th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!--Daily cost in accounce end -->

  <!--Total balance start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         Total balance on {{ $date }}
        </div>
        <div class="panel-body">
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Taka</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ "Total Outdoor Report Income" }}</td>
              <td>{{ $totalOutdoorIncome }} /-</td>
            </tr>
            <tr>
              <td>{{ "Total Indoor Report Income" }}</td>
              <td>{{ $totalIndoorIncome }} /-</td>
            </tr>
            <tr>
              <td>{{ "Total Admit Patient Income" }}</td>
              <td>{{ $totalIndoorPatientIncome }} /-</td>
            </tr>
            <tr>
              <th>{{ "Total Income" }}</th>
              <th>{{ $totalOutdoorIncome + $totalIndoorIncome + $totalIndoorPatientIncome }} /-</th>
            </tr>
            <tr>
              <th>{{ "Total Cost "}}</th>
              <th>{{ $totalCost }} /-</th>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>Net Balance</th>
              <th>{{ $totalOutdoorIncome + $totalIndoorIncome + $totalIndoorPatientIncome - $totalCost }} /-</th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!--Total balance end -->

  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection