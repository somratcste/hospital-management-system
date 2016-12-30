 @extends('layouts.master')

@section('top_header')
  Accounce Cost Information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <!-- Monthly Outdoor Income Start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Monthly Outdoor Report Income on {{ $date }}
        </div>
        <div class="panel-body">
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Date</th>
              <th>Taka</th>
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
              <td>{{ $outdoor_income->created_at->format('m-d-Y')}}</td>
              <td>{{ $outdoor_income->totalOutdoorIncome }} /-</td> 
                  @php 
                  $totalOutdoorIncome = $outdoor_income->totalOutdoorIncome+ $totalOutdoorIncome @endphp                        
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalOutdoorIncome }} Tk.</th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!-- Monthly Outdoor Income End -->

  <!-- Monthly Indoor Income Start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Monthly Indoor Report Income on {{ $date }}
        </div>
        <div class="panel-body">
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Date</th>
              <th>Taka</th>
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
              <td>{{ $indoor_income->created_at->format('m-d-Y')}}</td>
              <td>{{ $indoor_income->totalIndoorIncome }} /-</td> 
                  @php 
                  $totalIndoorIncome = $indoor_income->totalIndoorIncome+ $totalIndoorIncome @endphp                        
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalIndoorIncome }} Tk.</th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!-- Monthly Indoor Income End -->


  <!-- Monthly Indoor Patient Income Start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Monthly Indoor Patient Income on {{ $date }}
        </div>
        <div class="panel-body">
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Date</th>
              <th>Taka</th>
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
              <td>{{ $indoor_patient_income->created_at->format('m-d-Y')}}</td>
              <td>{{ $indoor_patient_income->totalIndoorPatientIncome }} /-</td> 
                  @php 
                  $totalIndoorPatientIncome = $indoor_patient_income->totalIndoorPatientIncome+ $totalIndoorPatientIncome @endphp                        
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalIndoorPatientIncome }} Tk.</th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!-- Monthly Indoor Patient Income End -->


  


  <!-- Monthly Cost Start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Monthly Cost on {{ $date }}
        </div>
        <div class="panel-body">
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Date</th>
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
              <td>{{ $accounce_cost->created_at->format('m-d-Y')}}</td>
              <td>{{ $accounce_cost->totalCost }} /-</td> 
                  @php 
                  $totalCost = $accounce_cost->totalCost+ $totalCost @endphp                        
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
  <!-- Monthly Cost End -->

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