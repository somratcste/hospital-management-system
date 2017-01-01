 @extends('layouts.master')

@section('top_header')
  Stock's Information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">

  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Add Item Name
        </div>
        <form action="{{ route('stock.store')}}" method="POST">
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
            <label class="col-sm-2 control-label">Quantity</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="quantity" required>
            </div>
          </div>
          <div class="form-group clear">
            <label class="col-sm-2 control-label">Price</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="price" required>
            </div>
          </div>

          <div class="form-group clear">
            <label class="col-sm-2 control-label">Stock Type</label>
            <div class="col-sm-7">
              <select class="form-control" name="type">            
                  <option value="1">Hospital</option>
                  <option value="0">Lab</option>
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
         View ALL stock
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
            @foreach ($stocks as $stock)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $stock->name }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Details</button></a></td>
              <div class="modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Stock's Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>ID</p>
                          <p>Name</p>
                          <p>quantity</p>
                          <p>price</p>
                          <p>Type</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $stock->id }}</p>
                          <p> : {{ $stock->name }}</p>
                          <p> : {{ $stock->quantity }}</p>
                          <p> : {{ $stock->price }}</p>
                          @if($stock->type == 1)
                          <p> : {{ "Hospital" }}</p>
                          @endif
                          @if($stock->type == 0)
                          <p> : {{"Laboratory"}}</p>
                          @endif
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
              <form class="form-horizontal bordered-group" role="form" action="{{ route('stock.update' , $stock->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">

          
            <div class="form-group clear">
              <label class="col-sm-3 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" value="{{ Request::old('name') ? Request::old('name') : isset($stock) ? $stock->name : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Quantity</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="quantity" value="{{ Request::old('quantity') ? Request::old('quantity') : isset($stock) ? $stock->quantity : '' }}" required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Price</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="price" value="{{ Request::old('price') ? Request::old('price') : isset($stock) ? $stock->price : '' }}" required>
              </div>
            </div>


            <div class="form-group clear">
              <label class="col-sm-3 control-label">Type</label>
              <div class="col-sm-8">
                <select class="form-control" name="type">
                  <option value="1" {{ $stock->type == 1 ? 'selected'  : '' }} >Hospital</option>
                  <option value="0" {{ $stock->type == 0 ? 'selected'  : '' }}>Laboratory</option>
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
                    <h4 class="modal-title">Delete stock's Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                    <form action="{{ route('stock.destroy' , $stock->id)}}" method="POST">
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
              @if($stocks->currentPage() !== 1)
                <li class="previous"><a href="{{ $stocks->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($stocks->currentPage() !== $stocks->lastPage() && $stocks->hasPages())
                <li class="next"><a href="{{ $stocks->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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