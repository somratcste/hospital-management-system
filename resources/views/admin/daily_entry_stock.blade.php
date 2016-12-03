@extends('layouts.master')

@section('top_header')
  Daily Entry information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Daily Stock Entry Report at {{ $type }} on {{ $date }}
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Item Name</th>
              <th>Quantity in Stock</th>
              <th>Entry</th>
              <th>Memo</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Item Name</th>
              <th>Quantity in Stock</th>
              <th>Entry</th>
              <th>Memo</th>
            </tr>          
            </tfoot>
          <tbody>
            <?php $i = 1; ?>
            @foreach($stockEntries as $stockEntry)
            <tr>
              <td><?php echo $i ; ?></td>         
              <td>{{ $stockEntry->name }}</td>         
              <td>{{ $stockEntry->quantity}}</td> 
              <td>{{ $stockEntry->quantity_entry }}</td>        
              <td>{{ $stockEntry->address }}</td>                 
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