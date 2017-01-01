@extends('layouts.master')

@section('top_header')
  Village Doctor's Information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Add New Name
        </div>
        <form action="{{ route('village.store')}}" method="POST">
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
            <label class="col-sm-2 control-label">Pharmacy Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="pharmacy" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Market Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="market" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="address" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Mobile No.</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="mobile" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Marketing Officer</label>
            <div class="col-sm-7">
              <select class="form-control" name="marketing_id">
                @foreach($marketings as $marketing)
                  <option value="{{ $marketing->id }}">{{ $marketing->name }}</option>
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
         View ALL Village Doctor's
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
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($villages as $village)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $village->name }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Details</button></a></td>
              <div class="modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Village Doctor's Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>ID</p>
                          <p>Name</p>
                          <p>Pharmacy Name</p>
                          <p>Market Name</p>
                          <p>Address </p>
                          <p>Mobile</p>
                          <p>Marketing Officer</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $village->id }}</p>
                          <p> : {{ $village->name }}</p>
                          <p> : {{ $village->pharmacy }}</p>
                          <p> : {{ $village->market }}</p>
                          <p> : {{ $village->address }}</p>
                          <p> : {{ $village->mobile }}</p>
                          <p> : {{ $village->marketing->name }}</p>
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
              <form class="form-horizontal bordered-group" role="form" action="{{ route('village.update' , $village->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">

          
            <div class="form-group clear">
              <label class="col-sm-3 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" value="{{ Request::old('name') ? Request::old('name') : isset($village) ? $village->name : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Pharmacy Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="pharmacy" value="{{ Request::old('pharmacy') ? Request::old('pharmacy') : isset($village) ? $village->pharmacy : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Market Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="market" value="{{ Request::old('market') ? Request::old('market') : isset($village) ? $village->market : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="address" value="{{ Request::old('address') ? Request::old('address') : isset($village) ? $village->address : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Mobile</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="mobile" value="{{ Request::old('mobile') ? Request::old('mobile') : isset($village) ? $village->mobile : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Marketing Officer</label>
              <div class="col-sm-8">
                <select class="form-control" name="marketing_id">
                @foreach ($marketings as $marketing)
                  <option value="{{ $marketing->id}}" {{ $village->marketing_id == $marketing->id ? 'selected'  : '' }} > {{ $marketing->name }} </option>
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
                    <h4 class="modal-title">Delete village Category</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                    <form action="{{ route('village.destroy' , $village->id)}}" method="POST">
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

              <div class="modal" id="list<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Find List</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('village.create')}}" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="village_id" value="{{ $village->id }}">


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
         </form>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
        <section>
        <nav>
          <ul class="pager">
              @if($villages->currentPage() !== 1)
                <li class="previous"><a href="{{ $villages->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($villages->currentPage() !== $villages->lastPage() && $villages->hasPages())
                <li class="next"><a href="{{ $villages->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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