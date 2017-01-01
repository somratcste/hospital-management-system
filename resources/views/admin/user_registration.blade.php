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
                            <label for="name" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" autocomplete="off" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="outdoor_id" class="col-md-4 control-label">Outdoor </label>

                            <div class="col-md-6">
                            <select class="form-control" name="outdoor_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="indoor_patient_id" class="col-md-4 control-label">Indoor </label>

                            <div class="col-md-6">
                            <select class="form-control" name="indoor_id" required>      
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
                            <label class="col-md-4 control-label">Refund</label>

                            <div class="col-md-6">
                            <select class="form-control" name="refund_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>


                    </div>
                     <div class="col-md-6" style="width: 450px;">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                            <label class="col-md-4 control-label">Accounce </label>

                            <div class="col-md-6">
                            <select class="form-control" name="accounce_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="invoice_id" class="col-md-4 control-label">Stock </label>

                            <div class="col-md-6">
                            <select class="form-control" name="stock_id" required>      
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>       
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="invoice_id" class="col-md-4 control-label">Data Entry </label>

                            <div class="col-md-6">
                            <select class="form-control" name="data_entry_id" required>      
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