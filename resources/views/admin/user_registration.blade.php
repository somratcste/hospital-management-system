@extends('layouts.master')

@section('top_header')
  Create a New User
@endsection


@section('content')
<div class="container">
    <div class="row">
    @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
    @endif
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user_registration.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

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
                                <input id="password" type="password" class="form-control" name="password">

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
                                <input id="confirm_password" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('outdoor_patient_id') ? ' has-error' : '' }}">
                            <label for="outdoor_patient_id" class="col-md-4 control-label">Outdoor Patient</label>

                            <div class="col-md-6">
                            <select class="form-control" name="outdoor_patient_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('outdoor_patient_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('outdoor_patient_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rf_id') ? ' has-error' : '' }}">
                            <label for="rf_id" class="col-md-4 control-label">Reference Fund (R.F) </label>

                            <div class="col-md-6">
                            <select class="form-control" name="rf_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('rf_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rf_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('doctor_id') ? ' has-error' : '' }}">
                            <label for="rf_id" class="col-md-4 control-label">Doctor </label>

                            <div class="col-md-6">
                            <select class="form-control" name="doctor_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('rf_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('doctor_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('indoor_patient_id') ? ' has-error' : '' }}">
                            <label for="indoor_patient_id" class="col-md-4 control-label">Indoor Admit Patient </label>

                            <div class="col-md-6">
                            <select class="form-control" name="indoor_patient_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('indoor_patient_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('indoor_patient_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                            <label for="employee_id" class="col-md-4 control-label">Employee </label>

                            <div class="col-md-6">
                            <select class="form-control" name="employee_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('employee_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employee_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('seat_id') ? ' has-error' : '' }}">
                            <label for="seat_id" class="col-md-4 control-label">Seat </label>

                            <div class="col-md-6">
                            <select class="form-control" name="seat_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('seat_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seat_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('test_id') ? ' has-error' : '' }}">
                            <label for="test_id" class="col-md-4 control-label">Test </label>

                            <div class="col-md-6">
                            <select class="form-control" name="test_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('test_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('test_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('operation_id') ? ' has-error' : '' }}">
                            <label for="operation_id" class="col-md-4 control-label">Operation </label>

                            <div class="col-md-6">
                            <select class="form-control" name="operation_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('operation_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('operation_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('invoice_id') ? ' has-error' : '' }}">
                            <label for="invoice_id" class="col-md-4 control-label">Invoice </label>

                            <div class="col-md-6">
                            <select class="form-control" name="invoice_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('invoice_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('invoice_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pharmacy_id') ? ' has-error' : '' }}">
                            <label for="pharmacy_id" class="col-md-4 control-label">Pharmacy </label>

                            <div class="col-md-6">
                            <select class="form-control" name="pharmacy_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('pharmacy_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pharmacy_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="invoice_id" class="col-md-4 control-label">Create User </label>

                            <div class="col-md-6">
                            <select class="form-control" name="user_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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