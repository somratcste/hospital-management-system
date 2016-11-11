@extends('layouts.master')

@section('top_header')
  Daily Entry information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Daily Entry Information
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Company Name</th>
              <th>Medicine Name</th>
              <th>Piece</th>
              <th>Price</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Company Name</th>
              <th>Medicine Name</th>
              <th>Piece</th>
              <th>Price</th>
              <th>Subtotal</th>
            </tr>         
            </tfoot>
          <tbody>
            <tr>
              <td>01</td>         
              <td>Square</td>         
              <td>Neoceptin R</td>         
              <td>500</td>
              <td>2 Tk.</td>
              <td>1000 Tk.</td>                 
            </tr>
            <tr>
              <td>01</td>         
              <td>Square</td>         
              <td>Neoceptin R</td>         
              <td>500</td>
              <td>2 Tk.</td>
              <td>1000 Tk.</td>                 
            </tr><tr>
              <td>01</td>         
              <td>Square</td>         
              <td>Neoceptin R</td>         
              <td>500</td>
              <td>2 Tk.</td>
              <td>1000 Tk.</td>                 
            </tr><tr>
              <td>01</td>         
              <td>Square</td>         
              <td>Neoceptin R</td>         
              <td>500</td>
              <td>2 Tk.</td>
              <td>1000 Tk.</td>                 
            </tr><tr>
              <td>01</td>         
              <td>Square</td>         
              <td>Neoceptin R</td>         
              <td>500</td>
              <td>2 Tk.</td>
              <td>1000 Tk.</td>                 
            </tr>
            <tr>
              <td></td>         
              <td></td>         
              <td></td>         
              <td></td>
              <td></td>
              <td>2,75,000 Tk.</td>                 
            </tr>
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--Admit Patient Section End-->

  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection