 @extends('layouts.master')

@section('top_header')
  Accounce Cost Information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Add New Cost
        </div>
        <form action="{{ route('accounce_cost.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
       @endif
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Particular</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="name" required>
            </div>
          </div>
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Taka</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="taka" required>
            </div>
          </div>

        </div>
        <div class="panel-footer" style="overflow: hidden;">
          <button type="submit" class="btn btn-success pull-right">Save</button>
        </div>
        </form>
    </div>
  </div>

  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
         View ALL Accounce Cost
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
            $totalAccounce = 0
          @endphp
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($accounce_costs as $accounce_cost)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $accounce_cost->name }}</td>
              <td>{{ $accounce_cost->taka }} /-</td> 
                  @php 
                  $totalAccounce = $accounce_cost->taka+ $totalAccounce @endphp                         
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Total</th>
              <th>{{ $totalAccounce }} Tk.</th>
            </tr>
          </tfoot>
        </table>
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