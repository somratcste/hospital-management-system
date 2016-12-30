@extends('layouts.master')

@section('top_header')
  Daily Delivary information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <!--Indoor admit patient start-->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Admit Patient List on {{ $date }}
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Admit Time</th>
              <th>Details</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Admit Time</th>
              <th>Details</th>
            </tr>          
            </tfoot>
          <tbody>
          @php $i = 0 @endphp
          @foreach($patient_admits as $patient_admit)
          <?php $i++; ?>
            <tr>
              <td>{{ $i }}</td>         
              <td>{{ $patient_admit->name }}</td>         
              <td>{{ $patient_admit->id }}</td>         
              <td>{{ $patient_admit->created_at->format('d-m-Y h:i:s A')}}</td>     
              <td>
                <form action="{{ route('patient.details') }}" method="GET">
                  {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="patient_id" value="{{ $patient_admit->id }}">
                <button class="btn btn-primary">Details</button>
                </form>
              </td>       
            </tr>
          @endforeach 
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--Indoor Admit Patient Section End-->

    <!--Indoor Release patient start-->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Release Patient List on {{ $date }}
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Release Time</th>
              <th>Details</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Release Time</th>
              <th>Details</th>
            </tr>          
            </tfoot>
          <tbody>
          @php $i = 0 @endphp
          @foreach($patient_releases as $patient_release)
          <?php $i++; ?>
            <tr>
              <td>{{ $i }}</td>         
              <td>{{ $patient_release->patient->name }}</td>         
              <td>{{ $patient_release->patient->id }}</td>         
              <td>{{ $patient_release->updated_at->format('d-m-Y h:i:s A')}}</td>     
              <td>
                <form action="{{ route('patient.details') }}" method="GET">
                  {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="patient_id" value="{{ $patient_release->patient->id }}">
                <button class="btn btn-primary">Details</button>
                </form>
              </td>          
            </tr>
          @endforeach 
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--Indoor Release Patient Section End-->



 
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection