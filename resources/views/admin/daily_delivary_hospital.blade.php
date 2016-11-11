@extends('layouts.master')

@section('top_header')
  Daily Delivary information
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Admin Patient
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Time</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Time</th>
              <th>Amount</th>
            </tr>          
            </tfoot>
          <tbody>
            <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>
              <td>20000 Tk.</td>                 
            </tr>
            <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>
              <td>20000 Tk.</td>                 
            </tr><tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>
              <td>20000 Tk.</td>                 
            </tr><tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>
              <td>20000 Tk.</td>                 
            </tr><tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>
              <td>20000 Tk.</td>                 
            </tr><tr>
              <td></td>         
              <td></td>         
              <td></td>         
              <td></td>
              <td>5,80,000 Tk.</td>                 
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