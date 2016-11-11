@extends('layouts.master')

@section('top_header')
  View All Patients
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Visiting List on {{ $doctor->name }} at 
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
              <th>P. Name</th>
              <th>P. ID</th>
              <th>View</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S. No</th>
              <th>P. Name</th>
              <th>P. ID</th>
              <th>View</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($patients as $patient)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $patient->name }}</td>
              <td>{{ $patient->id }}</td>
              <td>
                <form action="{{ route('doctor.view') }}" method="GET">
                  {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                <input type="hidden" name="serial" value="<?php echo $i; ?>">
                <button class="btn btn-primary">Print</button>
                </form>
              </td>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
        <section>
        <nav>
          <ul class="pager">
              @if($patients->currentPage() !== 1)
                <li class="previous"><a href="{{ $patients->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($patients->currentPage() !== $patients->lastPage() && $patients->hasPages())
                <li class="next"><a href="{{ $patients->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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