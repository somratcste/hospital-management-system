 @extends('layouts.master')

@section('top_header')
  Accounce Cost Information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <!-- Monthly Income Start -->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Monthly Income on {{ $date }}
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
            $totalIncome = 0
          @endphp
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($accounce_incomes as $accounce_income)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $accounce_income->created_at->format('m-d-Y')}}</td>
              <td>{{ $accounce_income->totalIncome }} /-</td> 
                  @php 
                  $totalIncome = $accounce_income->totalIncome+ $totalIncome @endphp                        
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalIncome }} Tk.</th>
            </tr>
          </tfoot>
        </table>
        <section>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!-- Monthly Income End -->

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
              <td>{{ "Total Outdoor Income" }}</td>
              <td>{{ $totalIncome }} /-</td>
            </tr>
            <tr>
              <td>{{ "Total Cost "}}</td>
              <td>{{ $totalCost }} /-</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>Net Balance</th>
              <th>{{ $totalIncome - $totalCost }} /-</th>
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