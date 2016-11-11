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
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Patient Name</th>
              <th>Patient ID</th>
              <th>Time</th>
            </tr>          
            </tfoot>
          <tbody>
            <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>                 
            </tr>
             <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>                 
            </tr>
             <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>                 
            </tr>
             <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>                 
            </tr>
             <tr>
              <td>01</td>         
              <td>Mr. Nazmul Hossain</td>         
              <td>10</td>         
              <td>10:32:59 a.m</td>                 
            </tr>
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--Admit Patient Section End-->

  <!--Start Due Report Section-->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Due Report List
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>Paid Amount</th>
              <th>Due Amount</th>
              <th>Time</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>Paid Amount</th>
              <th>Due Amount</th>
              <th>Time</th>
            </tr>         
            </tfoot>
          <tbody>
            <tr>
              <td>01</td>         
              <td>15</td>         
              <td>2500 Tk.</td>         
              <td>500 Tk.</td>
              <td>2000 Tk.</td> 
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>01</td>         
              <td>15</td>         
              <td>2500 Tk.</td>         
              <td>500 Tk.</td>
              <td>2000 Tk.</td> 
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>01</td>         
              <td>15</td>         
              <td>2500 Tk.</td>         
              <td>500 Tk.</td>
              <td>2000 Tk.</td> 
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>01</td>         
              <td>15</td>         
              <td>2500 Tk.</td>         
              <td>500 Tk.</td>
              <td>2000 Tk.</td> 
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>01</td>         
              <td>15</td>         
              <td>2500 Tk.</td>         
              <td>500 Tk.</td>
              <td>2000 Tk.</td> 
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td></td>         
              <td></td>         
              <td>50000 Tk.</td>         
              <td>20000 Tk.</td>
              <td>30000 Tk.</td> 
              <td></td>                
            </tr>
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--end due report list-->

  <!--start paid report list-->
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Paid Report List
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>Time</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Report ID</th>
              <th>Total Amount</th>
              <th>Time</th>
            </tr>         
            </tfoot>
          <tbody>
            <tr>
              <td>05</td>         
              <td>15</td>         
              <td>2500 Tk.</td>
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>05</td>         
              <td>15</td>         
              <td>2500 Tk.</td>
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>05</td>         
              <td>15</td>         
              <td>2500 Tk.</td>
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>05</td>         
              <td>15</td>         
              <td>2500 Tk.</td>
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td>05</td>         
              <td>15</td>         
              <td>2500 Tk.</td>
              <td>11:59:02 a.m</td>                
            </tr>
            <tr>
              <td></td>         
              <td></td>         
              <td>25000 Tk.</td>
              <td></td>                
            </tr>
          </tbody>
        </table>
      </div>

      </div>
    </div>
  </div>
  <!--end paid report list-->
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection