@extends('layouts.master')

@section('top_header')
  Daily Entry information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <!--Start Due Report Section-->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Due Outdoor Report List on {{ $date }}
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>Paid Amount</th>
              <th>Due Amount</th>
              <th>User Name</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>Paid Amount</th>
              <th>Due Amount</th>
              <th>User Name</th>
            </tr>         
            </tfoot>
          <tbody>
            @php $i = 1; @endphp
            @foreach($due_lists as $due_list)
            <tr>
              <td><?php echo $i; ?></td>         
              <td>{{ $due_list->id }}</td>         
              <td>{{ $due_list->total}}</td>         
              <td>{{ $due_list->receive_cash}}</td>
              <td>{{ $due_list->due}}</td>   
              <td style="text-transform:capitalize;">{{ $due_list->user->name }}</td>
            </tr>
            @php $i++ @endphp
            @endforeach            
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--end due report list-->

  <!--start paid report list-->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Paid Outdoor Report List on {{ $date  }}
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>User Name</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>User Name</th>
            </tr>         
            </tfoot>
          <tbody>
           @php $i = 1; @endphp
            @foreach($paid_lists as $paid_list)
            <tr>
              <td><?php echo $i; ?></td>         
              <td>{{ $paid_list->id }}</td>         
              <td>{{ $paid_list->total}}</td>   
              <td style="text-transform:capitalize;">{{ $paid_list->user->name }}</td>
            </tr>
            @php $i++ @endphp
            @endforeach  
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--end paid report list-->

  <!--start Refund report list-->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Refund Outdoor Report List on {{ $date }}
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total</th>
              <th>Less</th>
              <th>Refund</th>
              <th>User Name</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total</th>
              <th>Less</th>
              <th>Refund</th>
              <th>User Name</th>
            </tr>         
            </tfoot>
          <tbody>
           @php $i = 1; @endphp
            @foreach($refund_lists as $refund_list)
            <tr>
              <td><?php echo $i; ?></td>         
              <td>{{ $refund_list->id }}</td>         
              <td>{{ $refund_list->total}}</td>
              <td>{{ $refund_list->less }}</td>
              <td>{{ $refund_list->refund }}</td>      
              <td style="text-transform:capitalize;">{{ $due_list->user->name }}</td>
            </tr>
            @php $i++ @endphp
            @endforeach  
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--end Refund report list-->

    <!--start indoor report list-->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Indoor Report List on {{ $date  }}
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>User Name</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>User Name</th>
            </tr>         
            </tfoot>
          <tbody>
           @php $i = 1; @endphp
            @foreach($indoor_lists as $indoor_list)
            <tr>
              <td><?php echo $i; ?></td>         
              <td>{{ $indoor_list->id }}</td>         
              <td>{{ $indoor_list->total}}</td>   
              <td style="text-transform:capitalize;">{{ $indoor_list->user->name }}</td>
            </tr>
            @php $i++ @endphp
            @endforeach  
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--end indoor report list-->

  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection