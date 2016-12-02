@extends('layouts.master')

@section('top_header')
 Dashboard 
@endsection

@if(Auth::user()->name=='super')
@section('content')

      <!-- main area -->
      <div class="main-content">

        <div class="row">
          <div class="col-md-12">
            <div>
              <div class="widget bg-white">
                <h1 style="font-family: initial;text-align: center;font-size: 50px;">CENTRAL HOSPITAL</h1>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="row">
            <div class="widget bg-white">
              <center><img src="{{url('/images/hospital_one.jpg')}}" height="350px"  alt="Image"/></center>
            </div>    
        </div>
        <div class="row">
            <div class="widget bg-white">
              <center><img src="{{url('/images/hospital_two.jpg')}}" height="350px"  alt="Image"/></center>
            </div>    
        </div>
        <div class="row">
            <div class="widget bg-white">
              <center><img src="{{url('/images/hospital_three.jpg')}}" height="270px" alt="Image"/>  
              <img src="{{url('/images/hospital_four.jpg')}}" height="270px"  alt="Image"/></center>
            </div>  
        </div>
        <div class="row">
            <div class="widget bg-white">
              <center><img src="{{url('/images/general.jpg')}}" height="270px" width="475px" alt="Image"/>  
              <img src="{{url('/images/cabin.jpg')}}" height="270px"  alt="Image"/></center>
            </div>  
        </div> -->


        <!-- Start Hospital Section Report -->
        <div class="row">
          <div class="col-md-12">
            <div>
              <div class="widget bg-white">
                <h1 style="font-family: initial;text-align: center;font-size: 25px;">Hospital Section</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
           <div class="col-md-6" data-toggle="modal" data-target="#dailyEntryHospital" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Daily Entry Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="dailyEntryHospital" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Daily Entry Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('daily_entry_hospital')}}" method="get" enctype="multipart/form-data">

            <div class="clear">
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

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="01">October</option>
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

            <div class="clear">
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
            </form>
          </div>
        </div>

        <div class="col-md-6" data-toggle="modal" data-target="#dailyDelivaryHospital" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Daily Delivary Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="dailyDelivaryHospital" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Daily Delivary Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('daily_delivary_hospital')}}" method="get" enctype="multipart/form-data">


            <div class="clear">
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

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="01">October</option>
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

            <div class="clear">
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
            </form>
          </div>
        </div>

          
        </div>

        <div class="row">
           <div class="col-md-6" data-toggle="modal" data-target="#monthlyEntryPharmacy" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Monthly Entry Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="monthlyEntryPharmacy" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Monthly Entry Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('monthly_entry_hospital')}}" method="get" enctype="multipart/form-data">

            <div class="clear">
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

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="01">October</option>
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

              </div>
              </div>
              <div class="modal-footer no-border">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
            </form>
          </div>
        </div>

        <div class="col-md-6" data-toggle="modal" data-target="#monthlyDelivaryPharmacy" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Monthly Delivary Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="monthlyDelivaryPharmacy" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Monthly Delivary Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('monthly_delivary_hospital')}}" method="get" enctype="multipart/form-data">

            <div class="clear">
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

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="01">October</option>
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

              </div>
              </div>
              <div class="modal-footer no-border">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
            </form>
          </div>
        </div>

          
        </div>

        <!--Hospital Section End-->

        <!-- Start Stock Section Report -->
        <div class="row">
          <div class="col-md-12">
            <div>
              <div class="widget bg-white">
                <h1 style="font-family: initial;text-align: center;font-size: 25px;">Stock Section</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
           <div class="col-md-6" data-toggle="modal" data-target="#dailyEntryStock" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Daily Entry Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="dailyEntryStock" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Daily Entry Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('daily_entry_stock')}}" method="get" enctype="multipart/form-data">

            <div class="clear">
              <label class="col-sm-3 control-label">Year</label>
              <div class="col-sm-8">
                <select class="form-control" name="year">
                  <option value="{{ $year }}">{{ $year }}</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
              </div>
            </div>

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="{{ $month }}">
                        @if($month==12) December 
                        @elseif($month==11) November 
                        @elseif($month==10) October
                        @elseif($month==09) September
                        @elseif($month==08) August
                        @elseif($month==07) July
                        @elseif($month==06) June
                        @elseif($month==05) May
                        @elseif($month==04) April
                        @elseif($month==03) March
                        @elseif($month==02) February
                        @elseif($month==01) January
                        @endif
                  </option>
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

            <div class="clear">
              <label class="col-sm-3 control-label">Day</label>
              <div class="col-sm-8">
                <select class="form-control" name="day">
                  <option value="{{ $day }}">{{ $day }}</option>
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
            </form>
          </div>
        </div>

        <div class="col-md-6" data-toggle="modal" data-target="#dailyDelivaryStock" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Daily Delivary Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="dailyDelivaryStock" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Daily Delivary Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('daily_delivary_stock')}}" method="get" enctype="multipart/form-data">


            <div class="clear">
              <label class="col-sm-3 control-label">Year</label>
              <div class="col-sm-8">
                <select class="form-control" name="year">
                  <option value="{{ $year }}">{{ $year }}</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
              </div>
            </div>

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="{{ $month }}">
                        @if($month==12) December 
                        @elseif($month==11) November 
                        @elseif($month==10) October
                        @elseif($month==09) September
                        @elseif($month==08) August
                        @elseif($month==07) July
                        @elseif($month==06) June
                        @elseif($month==05) May
                        @elseif($month==04) April
                        @elseif($month==03) March
                        @elseif($month==02) February
                        @elseif($month==01) January
                        @endif
                  </option>
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

            <div class="clear">
              <label class="col-sm-3 control-label">Day</label>
              <div class="col-sm-8">
                <select class="form-control" name="day">
                  <option value="{{ $day }}">{{ $day }}</option>
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
            </form>
          </div>
        </div>

          
        </div>

        <div class="row">
           <div class="col-md-6" data-toggle="modal" data-target="#monthlyEntryStock" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Monthly Entry Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="monthlyEntryStock" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Monthly Entry Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('monthly_entry_stock')}}" method="get" enctype="multipart/form-data">

            <div class="clear">
              <label class="col-sm-3 control-label">Year</label>
              <div class="col-sm-8">
                <select class="form-control" name="year">
                  <option value="{{ $year }}">{{ $year }}</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
              </div>
            </div>

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="{{ $month }}">
                        @if($month==12) December 
                        @elseif($month==11) November 
                        @elseif($month==10) October
                        @elseif($month==09) September
                        @elseif($month==08) August
                        @elseif($month==07) July
                        @elseif($month==06) June
                        @elseif($month==05) May
                        @elseif($month==04) April
                        @elseif($month==03) March
                        @elseif($month==02) February
                        @elseif($month==01) January
                        @endif
                  </option>
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

              </div>
              </div>
              <div class="modal-footer no-border">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
            </form>
          </div>
        </div>

        <div class="col-md-6" data-toggle="modal" data-target="#monthlyDelivaryStock" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Monthly Delivary Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="monthlyDelivaryStock" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Monthly Delivary Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('monthly_delivary_stock')}}" method="get" enctype="multipart/form-data">

            <div class="clear">
              <label class="col-sm-3 control-label">Year</label>
              <div class="col-sm-8">
                <select class="form-control" name="year">
                  <option value="{{ $year }}">{{ $year }}</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
              </div>
            </div>

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="{{ $month }}">
                        @if($month==12) December 
                        @elseif($month==11) November 
                        @elseif($month==10) October
                        @elseif($month==09) September
                        @elseif($month==08) August
                        @elseif($month==07) July
                        @elseif($month==06) June
                        @elseif($month==05) May
                        @elseif($month==04) April
                        @elseif($month==03) March
                        @elseif($month==02) February
                        @elseif($month==01) January
                        @endif
                  </option>
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

              </div>
              </div>
              <div class="modal-footer no-border">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
            </form>
          </div>
        </div>

          
        </div>

        <!--Stock Section End-->

        <!--Pharmacy Section Start-->

        <div class="row">
          <div class="col-md-12">
            <div>
              <div class="widget bg-white">
                <h1 style="font-family: initial;text-align: center;font-size: 25px;">Pharmacy Section</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
           <div class="col-md-6" data-toggle="modal" data-target="#dailyEntryPharmacy" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Daily Entry Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="dailyEntryPharmacy" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Daily Entry Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('daily_entry_pharmacy')}}" method="get" enctype="multipart/form-data">

            <div class="clear">
              <label class="col-sm-3 control-label">Year</label>
              <div class="col-sm-8">
                <select class="form-control" name="year">
                  <option value="{{ $year }}">{{ $year }}</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
              </div>
            </div>

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="01">October</option>
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

            <div class="clear">
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
            </form>
          </div>
        </div>

        <div class="col-md-6" data-toggle="modal" data-target="#dailyDelivaryPharmacy
        " style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Daily Delivary Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="dailyDelivaryPharmacy" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Daily Delivary Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('daily_delivary_pharmacy')}}" method="get" enctype="multipart/form-data">

            <div class="clear">
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

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="01">October</option>
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

            <div class="clear">
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
            </form>
          </div>
        </div>

          
        </div>

        <div class="row">
           <div class="col-md-6" data-toggle="modal" data-target="#monthlyEntryHospital" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Monthly Entry Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="monthlyEntryHospital" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Monthly Entry Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('monthly_entry_pharmacy')}}" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="GET">
                <input type="hidden" name="doctor_id" value="">


            <div class="clear">
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

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="01">October</option>
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

              </div>
              </div>
              <div class="modal-footer no-border">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
            </form>
          </div>
        </div>

        <div class="col-md-6" data-toggle="modal" data-target="#monthlyDelivaryHospital" style="cursor: pointer;">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Monthly Delivary Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="monthlyDelivaryHospital" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Monthly Delivary Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{route('monthly_delivary_pharmacy')}}" method="get" enctype="multipart/form-data">

            <div class="clear">
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

            <div class="clear">
              <label class="col-sm-3 control-label">Month</label>
              <div class="col-sm-8">
                <select class="form-control" name="month">
                  <option value="01">October</option>
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

              </div>
              </div>
              <div class="modal-footer no-border">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
            </form>
          </div>
        </div>

          
        </div>

        <!--pharmacy Section End-->

    
          
        <!-- <div class="row">
          <div class="col-md-3">
            <div>
              <div class="widget bg-white">
                <div class="widget-icon bg-blue pull-left fa fa-microphone">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">8,372K</span>
                  <span class="widget-subtitle">Registered users</span>
                </div>
              </div>
              <div class="widget bg-white">
                <div class="widget-icon bg-danger pull-left fa fa-tint">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title percent">86</span>
                  <span class="widget-subtitle">Revenue increase</span>
                </div>
              </div>
              <div class="widget bg-white">
                <div class="widget-icon bg-success pull-left fa fa-paper-plane">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">7,355K</span>
                  <span class="widget-subtitle">Pending orders</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="widget-chart bg-white no-padding">
              <div class="row absolute tp lt rt p15">
                <div class="col-xs-12">
                  <div class="pull-right">
                    <i class="fa fa-square text-primary mr5"></i> Mail Server
                  </div>
                  <small class="text-uppercase">Transfer speeds</small>
                  <h4 class="text-primary bold no-margin">43.02mbps</h4>
                </div>
              </div>
              <div class="rickshaw_graph">
                <div id="dashboard-rickshaw" style="height:250px"></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget-chart bg-white">

              <div class="row">
                <div class="col-xs-12">
                  <small class="text-uppercase">Weekly distribution</small>
                  <h4 class="no-margin bold text-success">3,490K</h4>
                </div>
              </div>
              <div class="canvas-holder mt5 mb5">
                <div class="flot-pie chart-sm" style="height:171px;"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="widget widget-weather bg-white">
              <div class="widget-weather-icon climacon wind cloud sun"></div>
              <div class="mb15">
                <strong>San Francisco, CA</strong>
              </div>
              <div class="widget-weather-footer">
                <div>
                  <div class="small">MON</div>
                  <div class="climacon drizzle sun text-warning"></div>
                  <div class="degree-value">45&#176;</div>
                </div>
                <div>
                  <div class="small">TUE</div>
                  <div class="climacon snow sun text-danger"></div>
                  <div class="degree-value">42&#176;</div>
                </div>
                <div>
                  <div class="small">WED</div>
                  <div class="climacon haze sun text-info"></div>
                  <div class="degree-value">37&#176;</div>
                </div>
                <div>
                  <div class="small">THU</div>
                  <div class="climacon hail text-primary"></div>
                  <div class="degree-value">23&#176;</div>
                </div>
                <div>
                  <div class="small">FRI</div>
                  <div class="climacon fog moon"></div>
                  <div class="degree-value">34&#176;</div>
                </div>
                <div>
                  <div class="small">SAT</div>
                  <div class="climacon tornado text-success"></div>
                  <div class="degree-value">12&#176;</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="widget bg-white">
              <h3 class="text-info mt0 mb0 bold">56780</h3>
              <div class="small text-uppercase">Recent Activities</div>
              <small class="pt5">Donec ullamcorper nulla non metus auctor.</small>
            </div>
            <div class="widget-chart bg-white no-padding">
              <div class="absolute tp lt rt p15">
                <h3 class="mb0 mt0 bold">7,623K</h3>
                <div class="small text-uppercase">Daily income</div>
              </div>
              <div class="absolute tp rt pt15 pr15">
                <div class="text-success">
                  <i class="fa fa-caret-up"></i>
                  <span>6%</span>
                </div>
                <div class="small">+897</div>
              </div>
              <div class="rickshaw_graph">
                <div id="dashboard-rickshaw2" style="height:133px;"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="widget bg-white">
              <div class="text-center">
                <h6 class="text-uppercase">Page Views</h6>
                <div class="mt15">
                  <h1 class="text-primary">512k+</h1>
                  <div class="flot-line chart-sm" style="height:123px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="widget bg-white">
              <div class="widget-details widget-list">
                <div class="mb20">
                  <h4 class="no-margin text-uppercase">Sales</h4>
                  <small class="text-uppercase">Weekly projections</small>
                </div>
                <a href="javascript:;" class="widget-list-item">
                  <span class="label label-info pull-right">32</span> United States
                </a>
                <a href="javascript:;" class="widget-list-item">
                  <span class="label label-danger pull-right">54</span> China
                </a>

                <a href="javascript:;" class="widget-list-item">
                  <span class="label label-warning pull-right">45</span> Great Britain
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="widget bg-primary">
              <div class="widget-bg-icon">
                <i class="fa fa-bookmark-o"></i>
              </div>
              <div class="widget-details">
                <h4 class="no-margin">4,894K</h4>
                <span>Parks and recreation</span>
              </div>
            </div>
            <div class="widget bg-white">

              <div class="row">
                <div class="col-xs-4">
                  <h6>
                                      Distance travelled
                                  </h6>
                  <h1 class="mt0 mb0 bold">
                                      4389km
                                  </h1>
                  <small class="mb0">
                                      Avg 56km/Sec
                                  </small>
                </div>
                <div class="col-xs-8">
                  <div class="canvas-holder">
                    <div class="flot-bars chart" style="height:90px;"></div>
                  </div>
                </div>
              </div>

            </div>


          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <section class="widget bg-lightblue">
              <div class="widget-details">
                <a href="javascript:;" class="pull-left relative">
                  <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
                </a>
              </div>
              <div class="widget-details">
                <span class="h5 bold">Samuel Perkins</span>
                <small class="block">San Francisco, CA</small>
                <small class="block">Interactive UX Developer</small>
              </div>
            </section>
          </div>
          <div class="col-md-4">
            <section class="widget bg-brown text-center">
              <div class="widget-details">
                <h2 class="no-margin bold">14&#176;C</h2>
                <small class="text-uppercase">San Francisco, CA</small>
              </div>
              <div class="widget-details">
                <div class="climacon hail sun fa-4x"></div>
              </div>
            </section>
          </div>
          <div class="col-md-4">
            <section class="widget bg-success text-center">
              <div class="widget-details col-xs-4">
                <h2 class="no-margin">132</h2>
                <small class="text-uppercase">Pending</small>
              </div>
              <div class="widget-details col-xs-4">
                <h2 class="no-margin">43</h2>
                <small class="text-uppercase">Completed</small>
              </div>
              <div class="widget-details col-xs-4">
                <h2 class="no-margin">28</h2>
                <small class="text-uppercase">Failed</small>
              </div>
            </section>
          </div>
        </div> -->
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
@endsection
@endif

@if(Auth::user()->name=='outdoor' || Auth::user()->name=='indoor')
@section('content')
<div class="main-content">

  <div class="row">
    <div class="col-md-12">
      <div>
        <div class="widget bg-white">
          <h1 style="font-family: initial;text-align: center;font-size: 50px;">TRUST ONE HOSPITAL</h1>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
@endif