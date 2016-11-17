@extends('layouts.master')

@section('top_header')
  Outdoor Patients Information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Add New Patient
        </div>
        <form action="{{ route('patientout.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="panel-body">
        @if(Session::has('success1'))
        <div class="alert alert-success">
          {{Session::get('success1')}}
        </div>
       @endif
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Patient Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="name" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Mobile No.</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="mobile" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="address" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Visiting Doctor</label>
            <div class="col-sm-7">
              <select class="form-control" name="doctor_id" id="doctor_id">
                @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Visiting Charge</label>
            <div class="col-sm-7" id="visiting_charge">
              <input type="text" class="form-control" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Receive Cash</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="address" required>
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
         View ALL Outdoor Patient
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
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>ID</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($patientouts as $patientout)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $patientout->name }}</td>
              <td>{{ $patientout->id }}</td>
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
                          <p>ID</p>
                          <p>Name</p>
                          <p>Mobile</p>
                          <p>Address</p>
                          <p>Visiting Doctor</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $patientout->id }}</p>
                          <p> : {{ $patientout->name }}</p>
                          <p> : {{ $patientout->mobile }}</p>
                          <p> : {{ $patientout->address}}</p>
                          <p> : {{ $patientout->doctor->name }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer no-border">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              

              <td><a data-toggle="modal" data-target="#edit<?php echo $i; ?>" href=""><button type="button" class="btn btn-info">Edit</button></a></td>
              <div class="modal" id="edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Edit Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('patientout.update' , $patientout->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">

          
            <div class="form-group clear">
              <label class="col-sm-3 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" value="{{ Request::old('name') ? Request::old('name') : isset($patientout) ? $patientout->name : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Mobile</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="mobile" value="{{ Request::old('mobile') ? Request::old('mobile') : isset($patientout) ? $patientout->mobile : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="address" value="{{ Request::old('address') ? Request::old('address') : isset($patientout) ? $patientout->address : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Visiting Doctor</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">
                @foreach ($doctors as $doctor)
                  <option value="{{ $doctor->id}}" {{ $patientout->doctor_id == $doctor->id ? 'selected'  : '' }} > {{ $doctor->name }} </option>
                @endforeach
                </select>
              </div>
            </div>

              </div>
              </div>
              <div class="modal-footer no-border">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </div>
          </div>
        </div>
         </form>
              

              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete Outdoor Patient</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                    <form action="{{ route('patientout.destroy' , $patientout->id)}}" method="POST">
                    {{ csrf_field() }}
                  <input name="_method" type="hidden" value="DELETE">
                  <div class="modal-footer no-border">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
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
              @if($patientouts->currentPage() !== 1)
                <li class="previous"><a href="{{ $patientouts->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($patientouts->currentPage() !== $patientouts->lastPage() && $patientouts->hasPages())
                <li class="next"><a href="{{ $patientouts->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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

@section('run_custom_jquery')
<script type="text/javascript">
  $('#doctor_id').on('change' , function(e){
    var doctor_id = e.target.value;

    $.get('/hospital/public/patientout_api?doctor_id=' + doctor_id, function(data){
      $('#visiting_charge').empty();
      $.each(data, function(index,chargeobj){
        $('#visiting_charge').append('<input type="text" class="form-control" value="'+chargeobj.charge+'">')
      });
    });
  });
</script>
@endsection