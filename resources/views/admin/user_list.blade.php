@extends('layouts.master')

@section('top_header')
  View All User's
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          View All User's
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
              <th>User ID</th>
              @if(Auth::user()->name == 'super')
              <th>Edit</th>
              @endif
              @if(Auth::user()->name == 'super')
              <th>Delete</th>
              @endif
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>User ID</th>
              @if(Auth::user()->name == 'super')
              <th>Edit</th>
              @endif
              @if(Auth::user()->name == 'super')
              <th>Delete</th>
              @endif
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($users as $user)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->id }}</td>
              
              
              @if(Auth::user()->name == 'super')
              <td><a data-toggle="modal" data-target="#edit<?php echo $i; ?>" href=""><button type="button" class="btn btn-info">Edit</button></a></td>
              @endif
              <div class="modal" id="edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Update Rules</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row mb25">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('user.update' , $user->id)}}">
                        {{ csrf_field() }}
                      <input name="_method" type="hidden" value="PUT">
                        <div class="col-md-6" style="width: 450px;">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="outdoor_patient_id" class="col-md-4 control-label">Outdoor Patient</label>

                            <div class="col-md-6">
                            <select class="form-control" name="outdoor_patient_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->outdoor_patient_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Patient Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="outdoor_patient_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->outdoor_patient_edit_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Patient Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="outdoor_patient_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->outdoor_patient_delete_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rf_id" class="col-md-4 control-label">Reference Fund</label>

                            <div class="col-md-6">
                            <select class="form-control" name="rf_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->rf_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">R.F Edit </label>

                            <div class="col-md-6">
                            <select class="form-control" name="rf_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->rf_edit_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">R.F Delete  </label>

                            <div class="col-md-6">
                            <select class="form-control" name="rf_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->rf_delete_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rf_id" class="col-md-4 control-label">Doctor </label>

                            <div class="col-md-6">
                            <select class="form-control" name="doctor_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->doctor_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Doctor Edit </label>

                            <div class="col-md-6">
                            <select class="form-control" name="doctor_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->doctor_edit_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Doctor Delete  </label>

                            <div class="col-md-6">
                            <select class="form-control" name="doctor_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->doctor_delete_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="indoor_patient_id" class="col-md-4 control-label">Indoor Admit Patient </label>

                            <div class="col-md-6">
                            <select class="form-control" name="indoor_patient_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->indoor_patient_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Indoor Patient Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="indoor_patient_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->indoor_patient_edit_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="indoor_patient_id" class="col-md-4 control-label">Indoor Patient Delete </label>

                            <div class="col-md-6">
                            <select class="form-control" name="indoor_patient_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->indoor_patient_delete_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6" style="width: 450px;">

                        <div class="form-group">
                            <label for="employee_id" class="col-md-4 control-label">Employee </label>

                            <div class="col-md-6">
                            <select class="form-control" name="employee_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->employee_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Employee Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="employee_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->employee_edit_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Employee Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="employee_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->employee_delete_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="seat_id" class="col-md-4 control-label">Seat </label>

                            <div class="col-md-6">
                            <select class="form-control" name="seat_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->seat_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Seat Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="seat_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->seat_edit_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Seat Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="seat_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->seat_delete_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="test_id" class="col-md-4 control-label">Test </label>

                            <div class="col-md-6">
                            <select class="form-control" name="test_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->test_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Test Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="test_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->test_edit_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Test Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="test_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->test_delete_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Operation </label>

                            <div class="col-md-6">
                            <select class="form-control" name="operation_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->operation_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Operation Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="operation_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->operation_edit_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Operation Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="operation_delete_id" required>
                              <option value="0">No</option>
                              <option value="1" {{ $user->operation_delete_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="invoice_id" class="col-md-4 control-label">Indoor Invoice </label>

                            <div class="col-md-6">
                            <select class="form-control" name="invoice_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->invoice_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Invoice Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="invoice_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->invoice_edit_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Invoice Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="invoice_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->invoice_delete_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pharmacy_id" class="col-md-4 control-label">Pharmacy </label>

                            <div class="col-md-6">
                            <select class="form-control" name="pharmacy_id" required>      
                              <option value="0">No</option>
                              <option value="1" {{ $user->pharmacy_id == 1 ? 'selected'  : '' }}>Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="invoice_id" class="col-md-4 control-label">Create User </label>

                            <div class="col-md-6">
                            <select class="form-control" name="user_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4" style="margin-top:15px;">
                              <button type="submit" class="btn btn-success btn-lg btn-block">
                                  <i class="fa fa-btn fa-user"></i> Update
                              </button>
                          </div>
                      </div>

                        </div>
                    
                </div> <!--panel body -->
                
                </form>
              

              @if(Auth::user()->name == 'super')
              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
              @endif
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete users Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                  <form action="{{ route('user.destroy' , $user->id) }}" method="POST">
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
              @if($users->currentPage() !== 1)
                <li class="previous"><a href="{{ $users->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($users->currentPage() !== $users->lastPage() && $users->hasPages())
                <li class="next"><a href="{{ $users->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
@endsection