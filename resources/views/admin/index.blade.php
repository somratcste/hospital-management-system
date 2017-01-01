@extends('layouts.master')

@section('top_header')
 Dashboard 
@endsection

@section('content')

      <!-- main area -->
      <div class="main-content">

        <div class="row">
          <div class="col-md-12">
            <div>
              <div class="widget bg-white" 
              style="border-radius: 40px;
              background-color: darkslategrey;
              color: whitesmoke;">
                <h1 style="font-family: initial;text-align: center;font-size: 50px;"><img src="{{url('/images/central/logo11.png')}}" "alt="Central Hospital (PVT)" height="19%" width="19%" style="padding-bottom: 20px;"></img>
                <br />
              
                CENTRAL HOSPITAL (PVT)</h1>
                <br />

              </div>
            </div>
          </div>
        </div>

        <!--start Accounce Section-->

        @if(Auth::user()->accounce_id == 1)
        <!-- Start Stock Section Report -->
        <div class="row">
          <div class="col-md-12">
            <div>
              <div class="widget bg-white" 
              style="border-radius: 40px;
              background-color: #386969;
              color: whitesmoke;">
                <h1 style="font-family: initial;text-align: center;font-size: 35px;">Accounce Section</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
           <div class="col-md-6" data-toggle="modal" data-target="#dailyEntryAccounce" style="cursor: pointer;">
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Daily Entry Report">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Daily Accounce</span>
              </div>
            </section>
          </div>
          <div class="modal" id="dailyEntryAccounce" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Daily Accounce</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('daily_accounce') }}" method="get" enctype="multipart/form-data">

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

        <div class="col-md-6" data-toggle="modal" data-target="#monthlyAccounce" style="cursor: pointer;">
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Daily Delivary Report">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Monthly Accounce</span>
              </div>
            </section>
          </div>
          <div class="modal" id="monthlyAccounce" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Searcch Monthly Accounce</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('monthly_accounce')}}" method="get" enctype="multipart/form-data">

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
        <!--end Accounce Section-->
        @endif

        @if(Auth::user()->indoor_id == 1)
        <!-- Start Hospital Section Report -->
        <div class="row">
          <div class="col-md-12">
            <div>
              <div class="widget bg-white" 
              style="border-radius: 40px;
              background-color: #386969;
              color: whitesmoke;">
                <h1 style="font-family: initial;text-align: center;font-size: 35px;">Hospital Section</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
           <div class="col-md-6" data-toggle="modal" data-target="#dailyEntryHospital" style="cursor: pointer;">
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Daily Entry Report">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Daily Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="dailyEntryHospital" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Daily Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('daily_entry_hospital')}}" method="get" enctype="multipart/form-data">

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

        <div class="col-md-6" data-toggle="modal" data-target="#dailyDelivaryHospital" style="cursor: pointer;">
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Daily Delivary Report">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Daily Patient Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="dailyDelivaryHospital" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Daily Patient Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('daily_delivary_hospital')}}" method="get" enctype="multipart/form-data">


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
           <div class="col-md-6" data-toggle="modal" data-target="#monthlyEntryHospital" style="cursor: pointer;">
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Monthly Entry Report">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Monthly Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="monthlyEntryHospital" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Monthly Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('monthly_entry_hospital')}}" method="get" enctype="multipart/form-data">

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

        <div class="col-md-6" data-toggle="modal" data-target="#monthlyDelivaryHospital" style="cursor: pointer;">
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Monthly Delivary Report">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;">Monthly Patient Report</span>
              </div>
            </section>
          </div>
          <div class="modal" id="monthlyDelivaryHospital" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Monthly Patient Report</h4>
              </div>
              <div class="modal-body">
                <div class="row mb25">
              <form class="form-horizontal bordered-group" role="form" action="{{ route('monthly_delivary_hospital')}}" method="get" enctype="multipart/form-data">

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
        <!--Hospital Section End-->
        @endif

        @if(Auth::user()->stock_id == 1)
        <!-- Start Stock Section Report -->
        <div class="row">
          <div class="col-md-12">
            <div>
              <div class="widget bg-white" 
              style="border-radius: 40px;
              background-color: #386969;
              color: whitesmoke;">
                <h1 style="font-family: initial;text-align: center;font-size: 35px;">Stock Section</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
           <div class="col-md-6" data-toggle="modal" data-target="#dailyEntryStock" style="cursor: pointer;">
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Daily Entry Report">
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
              <label class="col-sm-3 control-label">Select One</label>
              <div class="col-sm-8">
                <select class="form-control" name="type">
                  <option value="1">Hospital</option>
                  <option value="0">Laboratory</option>
                </select>
              </div>
            </div>

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
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Daily Delivary Report">
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
              <label class="col-sm-3 control-label">Select One</label>
              <div class="col-sm-8">
                <select class="form-control" name="type">
                  <option value="1">Hospital</option>
                  <option value="0">Laboratory</option>
                </select>
              </div>
            </div>

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
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Monthly Entry Report">
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
              <label class="col-sm-3 control-label">Select One</label>
              <div class="col-sm-8">
                <select class="form-control" name="type">
                  <option value="1">Hospital</option>
                  <option value="0">Laboratory</option>
                </select>
              </div>
            </div>

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
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Monthly Delivary Report">
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
              <label class="col-sm-3 control-label">Select One</label>
              <div class="col-sm-8">
                <select class="form-control" name="type">
                  <option value="1">Hospital</option>
                  <option value="0">Laboratory</option>
                </select>
              </div>
            </div>

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
        @endif

        @if(Auth::user()->super_id == 1)
        <!--Pharmacy Section Start-->
        <div class="row">
          <div class="col-md-12">
            <div>
              <div class="widget bg-white" 
              style="border-radius: 40px;
              background-color: #386969;
              color: whitesmoke;">
                <h1 style="font-family: initial;text-align: center;font-size: 35px;">Pharmacy Section</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
           <div class="col-md-6" data-toggle="modal" data-target="#dailyEntryPharmacy" style="cursor: pointer;">
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Daily Entry Report">
              </div>
              @php 
                session_start();
                $_SESSION['name'] = "www.somrat.info";
              @endphp
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;"><a href="http://localhost/pharmacy/super/report.php" target="_blank">Daily Report</a></span>
              </div>
            </section>
          </div>
          

        <div class="col-md-6" data-toggle="modal" data-target="#dailyDelivaryPharmacy
        " style="cursor: pointer;">
            <section class="widget bg-lightblue"
              style="border-radius: 40px;
              background-color: #458484;
              color: whitesmoke;">
              <div class="widget-details">
                  <img src="images/central/list-9.png" class="avatar avatar-sm img-circle bordered" alt="Daily Delivary Report">
              </div>
              <div class="widget-details">
                <span class="h3 bold" style="font-family: initial;"><a href="http://localhost/pharmacy/super/report.php" target="_blank">Monthly Report</a></span>
              </div>
            </section>
          </div>

        </div>
        <!--pharmacy Section End-->
        @endif

      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
@endsection

