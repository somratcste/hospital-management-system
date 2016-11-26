@extends('layouts.master')

@section('top_header')
  Create a New User
@endsection


@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 100px;">
    @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
    @endif
        <!-- <div class="col-md-6"> -->
            <div class="panel">
                <div class="panel-heading" style="margin-left: -300px;">Register User</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.store')}}">
                        {{ csrf_field() }}
                        <div class="col-md-6" style="width: 450px;">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="confirm_password" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="outdoor_patient_id" class="col-md-4 control-label">Outdoor Patient</label>

                            <div class="col-md-6">
                            <select class="form-control" name="outdoor_patient_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Patient Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="outdoor_patient_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Patient Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="outdoor_patient_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rf_id" class="col-md-4 control-label">Reference Fund (R.F) </label>

                            <div class="col-md-6">
                            <select class="form-control" name="rf_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">R.F Edit </label>

                            <div class="col-md-6">
                            <select class="form-control" name="rf_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">R.F Delete  </label>

                            <div class="col-md-6">
                            <select class="form-control" name="rf_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rf_id" class="col-md-4 control-label">Doctor </label>

                            <div class="col-md-6">
                            <select class="form-control" name="doctor_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Doctor Edit </label>

                            <div class="col-md-6">
                            <select class="form-control" name="doctor_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Doctor Delete  </label>

                            <div class="col-md-6">
                            <select class="form-control" name="doctor_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="indoor_patient_id" class="col-md-4 control-label">Indoor Admit Patient </label>

                            <div class="col-md-6">
                            <select class="form-control" name="indoor_patient_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Indoor Patient Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="indoor_patient_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="indoor_patient_id" class="col-md-4 control-label">Indoor Patient Delete </label>

                            <div class="col-md-6">
                            <select class="form-control" name="indoor_patient_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
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
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Employee Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="employee_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Employee Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="employee_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="seat_id" class="col-md-4 control-label">Seat </label>

                            <div class="col-md-6">
                            <select class="form-control" name="seat_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Seat Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="seat_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Seat Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="seat_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="test_id" class="col-md-4 control-label">Test </label>

                            <div class="col-md-6">
                            <select class="form-control" name="test_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Test Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="test_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Test Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="test_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Operation </label>

                            <div class="col-md-6">
                            <select class="form-control" name="operation_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Operation Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="operation_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Operation Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="operation_delete_id" required>
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="invoice_id" class="col-md-4 control-label">Indoor Invoice </label>

                            <div class="col-md-6">
                            <select class="form-control" name="invoice_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Invoice Edit</label>

                            <div class="col-md-6">
                            <select class="form-control" name="invoice_edit_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Invoice Delete</label>

                            <div class="col-md-6">
                            <select class="form-control" name="invoice_delete_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pharmacy_id" class="col-md-4 control-label">Pharmacy </label>

                            <div class="col-md-6">
                            <select class="form-control" name="pharmacy_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
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

                        </div>
                    
                </div> <!--panel body -->
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-3">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            <i class="fa fa-btn fa-user"></i> Register
                        </button>
                    </div>
                </div>
                </form>
            </div>
        <!-- </div>  --><!--col-md-6 -->
    </div>
</div>
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