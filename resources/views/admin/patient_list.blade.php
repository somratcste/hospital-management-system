@extends('layouts.master')

@section('top_header')
  View All Admit Patients
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Patients Information
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
              <th>Name</th>
              <th>ID</th>
              <th>Phone</th>
              <th>View</th>
              @if(Auth::user()->indoor_patient_delete_id == 1)
              <th>Delete</th>
              @endif
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>ID</th>
              <th>Phone</th>
              <th>View</th>
              @if(Auth::user()->indoor_patient_delete_id == 1)
              <th>Delete</th>
              @endif
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($patients as $patient)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $patient->name }}</td>
              <td>{{ $patient->id }}</td>
              <td>{{ $patient->pphone }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Details</button></a></td>
              <div class="modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Patient's Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>Admit DateTime</p>
                          <p>Name</p>
                          <p>Patient ID</p>
                          @if($patient->fh == 1)
                            <p>Father's Name</p>
                          @else
                            <p>Husband Name</p>
                          @endif
                          <p>Gender</p>
                          <p>Blood Group</p>
                          <p>Age</p>
                          <p>Religion</p>
                          <p>Occupation</p>
                          <p>Consultant</p>
                          <p>Allocated Seat</p>
                          <p>Mobile</p>
                          <p>Home Phone</p>
                          <p>Local Address</p>
                          <p>Permanent Address</p>
                        </div>
                        <div class="col-xs-7">
                          <P> : {{ $patient->created_at->format('d-m-Y h.i.A')}}</P>
                          <p> : {{ $patient->name }}</p>
                          <p> : {{ $patient->id or '101' }}</p>
                          <p> :  {{ $patient->fname }}</p>
                          <p> : {{ $patient->gender }}</p>
                          <p> : {{ $patient->bloodGroup }}</p>
                          <p> : {{ $patient->age }}</p>
                          <p> : {{ $patient->religion }}</p>
                          <p style="text-transform: capitalize;"> : {{ $patient->occupation }}</p>
                          <p> : {{ $patient->doctor->name }}</p>
                          <p> : {{ $patient->seat->seatFloor }}nd Floor {{ $patient->seat->seatNo}} no. Bed</p>
                          <p> : {{ $patient->pphone }}</p>
                          <p> : {{ $patient->hphone }}</p>
                          <p> : {{ $patient->laddress }}</p>
                          <p> : {{ $patient->paddress }}</p>

                </div>
                      </div>
                    </div>
                    <div class="modal-footer no-border">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              
              @if(Auth::user()->indoor_patient_delete_id == 1)
              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
              @endif
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete Patients Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                  <form action="{{ route('patient.delete') }}" method="">
                  <div class="modal-footer no-border">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                  </div>
                  </form>
                </div>
              </div>
              </div>
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