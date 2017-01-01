 @extends('layouts.master')

@section('top_header')
  Doctor's Information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Add New Name
        </div>
        <form action="{{ route('doctor.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="panel-body">
        @if(Session::has('success1'))
        <div class="alert alert-success">
          {{Session::get('success1')}}
        </div>
       @endif
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="name" required>
            </div>
          </div>
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Degree</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="degree" required>
            </div>
          </div>
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Mobile No.</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="mobile" required>
            </div>
          </div>
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Visiting Charge</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="charge" required>
            </div>
          </div>
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Specialist</label>
            <div class="col-sm-7">
              <select class="form-control" name="specialist_id">
                @foreach($specialists as $specialist)
                  <option value="{{ $specialist->id }}">{{ $specialist->name }}</option>
                @endforeach
              </select>
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
         View ALL Doctor
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
              <th>View</th>
              <th>Edit</th>
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
              <th>Visiting</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>View</th>
              <th>Edit</th>
              @if(Auth::user()->super_id == 1)
              <th>Delete</th>
              @endif
              <th>Visiting</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($doctors as $doctor)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $doctor->name }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Details</button></a></td>
              <div class="modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Doctor's Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>ID</p>
                          <p>Name</p>
                          <p>Degree</p>
                          <p>Mobile</p>
                          <p>Charge</p>
                          <p>Specialist</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $doctor->id }}</p>
                          <p> : {{ $doctor->name }}</p>
                          <p> : {{ $doctor->degree }}</p>
                          <p> : {{ $doctor->mobile }}</p>
                          <p> : {{ $doctor->charge }}</p>
                          <p> : {{ $doctor->specialist->name }}</p>
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
              <form class="form-horizontal bordered-group" role="form" action="{{ route('doctor.update' , $doctor->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">

          
            <div class="form-group clear">
              <label class="col-sm-3 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" value="{{ Request::old('name') ? Request::old('name') : isset($doctor) ? $doctor->name : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Degree</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="degree" value="{{ Request::old('degree') ? Request::old('degree') : isset($doctor) ? $doctor->degree : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Mobile</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="mobile" value="{{ Request::old('mobile') ? Request::old('mobile') : isset($doctor) ? $doctor->mobile : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Charge</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="charge" value="{{ Request::old('charge') ? Request::old('charge') : isset($doctor) ? $doctor->charge : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Specialist</label>
              <div class="col-sm-8">
                <select class="form-control" name="specialist_id">
                @foreach ($specialists as $specialist)
                  <option value="{{ $specialist->id}}" {{ $doctor->specialist_id == $specialist->id ? 'selected'  : '' }} > {{ $specialist->name }} </option>
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
              
              @if(Auth::user()->super_id == 1)
              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
              @endif
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete Doctor's Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                    <form action="{{ route('doctor.destroy' , $doctor->id)}}" method="POST">
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

              <td><a data-toggle="modal" data-target="#list<?php echo $i; ?>" href=""><button type="button" class="btn btn-primary">List</button></a></td>
              <div class="modal" id="list<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Find Doctors  Visiting List</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('doctor.create') }}" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">


            <div class="form-group clear">
              <label class="col-sm-3 control-label">Year</label>
              <div class="col-sm-8">
                <select class="form-control" name="year">
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Day</label>
              <div class="col-sm-8">
                <select class="form-control" name="day">
                  <option value="01">1</option>
                  <option value="02">2</option>
                  <option value="03">3</option>
                  <option value="04">4</option>
                  <option value="05">5</option>
                  <option value="06">6</option>
                  <option value="07">7</option>
                  <option value="08">8</option>
                  <option value="09">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
              </div>
            </div>

              </div>
              </div>
              <div class="modal-footer no-border">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </div>
        </div>
         </form>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
        <section>
        <nav>
          <ul class="pager">
              @if($doctors->currentPage() !== 1)
                <li class="previous"><a href="{{ $doctors->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($doctors->currentPage() !== $doctors->lastPage() && $doctors->hasPages())
                <li class="next"><a href="{{ $doctors->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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