@extends('layouts.master')

@section('top_header')
  Daily Delivary information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Monthly Stock Delivary Report at {{ $type }} on {{ $date }}
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Item Name</th>
              <th>Quantity in Stock</th>
              <th>Delivary</th>
              <th>Address</th>
              <th>Date</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Item Name</th>
              <th>Quantity in Stock</th>
              <th>Delivary</th>
              <th>Address</th>
              <th>Date</th>
            </tr>          
            </tfoot>
          <tbody>
            <?php $i = 1; ?>
            @foreach($stockDelivaries as $stockDelivary)
            <tr>
              <td><?php echo $i ; ?></td>         
              <td>{{ $stockDelivary->name }}</td>         
              <td>{{ $stockDelivary->quantity}}</td> 
              <td>{{ $stockDelivary->quantity_delivary }}</td>        
              <td>{{ $stockDelivary->address }}</td>
              <td>{{ $stockDelivary->created_at }}</td>                 
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--Admit Patient Section End-->

  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection