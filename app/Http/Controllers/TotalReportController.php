<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\StockEntry;
use DB;
use App\StockDelivary;
use App\AccounceCost;
use Carbon\Carbon;
use App\InvoiceOut;
use App\Refund;
use App\OutdoorIncome;
use App\IndoorIncome;
use App\IndoorPatientIncome; 
use App\Report;
use App\Patient;
use App\Invoice;

class TotalReportController extends Controller
{ 
	public  function __construct()
	{
		date_default_timezone_set("Asia/Dhaka");
	}
	public function dailyAccounce(Request $request)
	{
		$day = $request['day'];
		$month = $request['month'];
		$year = $request['year'];
		$date = $year .'-'. $month . '-' . $day ;
		$accounce_costs = AccounceCost::whereDate('created_at' , '=' , $date)->orderBy('created_at' , 'desc')->get();
		$outdoor_incomes = OutdoorIncome::whereDate('created_at','=', $date)->orderBy('created_at','desc')->get();
		$indoor_incomes = IndoorIncome::whereDate('created_at','=', $date)->orderBy('created_at','desc')->get();
		$indoor_patient_incomes = IndoorPatientIncome::whereDate('created_at','=',$date)->orderBy('created_at','desc')->get();
		return view('admin.daily_accounce', ['accounce_costs' => $accounce_costs , 'date' => $date ,'outdoor_incomes'=> $outdoor_incomes,'indoor_incomes'=>$indoor_incomes,'indoor_patient_incomes'=>$indoor_patient_incomes]);
	}

	public function monthlyAccounce(Request $request)
	{
		$month = $request['month'];
		$year = $request['year'];
		$date = $month  .'-'. $year ; 
		$accounce_costs = AccounceCost::whereMonth('created_at' , '=' , $month)
						->select('taka','created_at',DB::raw('SUM(taka) as totalCost'))
						->groupBy(DB::raw('Date(created_at)'))
						->get(array('taka','created_at'));
		$outdoor_incomes = OutdoorIncome::whereMonth('created_at' , '=' , $month)
						->select('taka','created_at',DB::raw('SUM(taka) as totalOutdoorIncome'))
						->groupBy(DB::raw('Date(created_at)'))
						->get(array('taka','created_at'));

		$indoor_incomes = IndoorIncome::whereMonth('created_at' , '=' , $month)
						->select('taka','created_at',DB::raw('SUM(taka) as totalIndoorIncome'))
						->groupBy(DB::raw('Date(created_at)'))
						->get(array('taka','created_at'));

	$indoor_patient_incomes = IndoorPatientIncome::whereMonth('created_at' , '=' , $month)
						->select('taka','created_at',DB::raw('SUM(taka) as totalIndoorPatientIncome'))
						->groupBy(DB::raw('Date(created_at)'))
						->get(array('taka','created_at'));
						
		return view('admin.monthly_accounce', ['accounce_costs' => $accounce_costs,'date'=> $date,'outdoor_incomes'=> $outdoor_incomes,'indoor_incomes'=>$indoor_incomes,'indoor_patient_incomes'=>$indoor_patient_incomes]);
	}

	public function dailyEntryHospital(Request $request)
	{
		$day = $request['day'];
		$month = $request['month'];
		$year = $request['year'];
		$date = $year .'-'. $month . '-' . $day ;
		$due_lists = InvoiceOut::whereDate('created_at' , '=' , $date)
					->orderBy('created_at' , 'desc')
					->where('due','!=',0)
					->get();
		$paid_lists = InvoiceOut::whereDate('created_at' , '=' , $date)
					->orderBy('created_at' , 'desc')
					->whereRaw('total = receive_cash')
					->get();
		$refund_lists = Refund::whereDate('created_at' , '=' , $date)
					->orderBy('created_at' , 'desc')
					->get();

		$indoor_lists = Report::whereDate('created_at' , '=' , $date)
					->orderBy('created_at' , 'desc')
					->get();

		return view('admin.daily_entry_hospital' , ['due_lists'=>$due_lists,'paid_lists'=>$paid_lists , 'refund_lists' => $refund_lists,'date'=>$date,'indoor_lists'=>$indoor_lists]);
	}

	public function dailyDelivaryHospital(Request $request)
	{
		$day = $request['day'];
		$month = $request['month'];
		$year = $request['year'];
		$date = $year .'-'. $month . '-' . $day ;
		$patient_admits = Patient::whereDate('created_at','=',$date)
				->orderBy('created_at','desc')
				->get();
		$patient_releases = Invoice::whereDate('updated_at','=',$date)
				->orderBy('created_at','desc')
				->get();
		return view('admin.daily_delivary_hospital',['patient_admits'=>$patient_admits,'date'=>$date,'patient_releases'=>$patient_releases]);
	}

	public function monthlyEntryHospital(Request $request)
	{
		$month = $request['month'];
		$year = $request['year'];
		$date = $year .'-'. $month ;
		$due_lists = InvoiceOut::whereMonth('created_at' , '=' , $month)
					->whereYear('created_at','=', $year)
					->orderBy('created_at' , 'asc')
					->where('due','!=',0)
					->get();
		$paid_lists = InvoiceOut::whereMonth('created_at' , '=' , $month)
					->whereYear('created_at','=', $year)
					->orderBy('created_at' , 'asc')
					->whereRaw('total = receive_cash')
					->get();
		$refund_lists = Refund::whereMonth('created_at' , '=' , $month)
					->whereYear('created_at','=', $year)
					->orderBy('created_at' , 'asc')
					->get();

		$indoor_lists = Report::whereMonth('created_at' , '=' , $month)
					->whereYear('created_at','=', $year)					
					->orderBy('created_at' , 'asc')
					->get();

		return view('admin.monthly_entry_hospital' , ['due_lists'=>$due_lists,'paid_lists'=>$paid_lists , 'refund_lists' => $refund_lists,'date'=>$date,'indoor_lists'=>$indoor_lists]);
	}

	public function monthlyDelivaryHospital(Request $request)
	{
		$month = $request['month'];
		$year = $request['year'];
		$date = $year .'-'. $month ;
		$patient_admits = Patient::whereMonth('created_at' , '=' , $month)
					->whereYear('created_at','=', $year)					
					->orderBy('created_at' , 'asc')
					->get();
		$patient_releases = Invoice::whereMonth('created_at' , '=' , $month)
					->whereYear('created_at','=', $year)					
					->orderBy('created_at' , 'asc')
					->get();
		return view('admin.monthly_delivary_hospital',['patient_admits'=>$patient_admits,'date'=>$date,'patient_releases'=>$patient_releases]);
	}

	// start stock section 

	public function dailyEntryStock(Request $request)
	{
		if($request['type'] == 1 ) 
			$type = 'Hospital';
		else
			$type = 'Laboratory';
		$day = $request['day'];
		$month = $request['month'];
		$year = $request['year'];
		$date = $year .'-'. $month . '-' . $day ; 
		$stockEntry = DB::table('stocks')
					->join('stock_entries' , 'stocks.id', '=' , 'stock_entries.stock_id')
					->where('stock_entries.type' , '=' , $request['type'])
					->whereDate('stock_entries.created_at' , '=' , $date)
					->get();
		return view('admin.daily_entry_stock',['stockEntries' => $stockEntry , 'type'=> $type , 'date' => $date]);
	}

	public function dailyDelivaryStock(Request $request)
	{
		if($request['type'] == 1 ) 
			$type = 'Hospital';
		else
			$type = 'Laboratory';
		$day = $request['day'];
		$month = $request['month'];
		$year = $request['year'];
		$date = $year .'-'. $month . '-' . $day ; 
		$stockDelivary = DB::table('stocks')
					->join('stock_delivaries' , 'stocks.id' , '=' , 'stock_delivaries.stock_id')
					->where('stock_delivaries.type' , '=' , $request['type'])
					->whereDate('stock_delivaries.created_at' , '=' , $date)
					->get();
		return view('admin.daily_delivary_stock',['stockDelivaries' => $stockDelivary,'type' => $type,'date'=>$date]);
	}

	public function monthlyEntryStock(Request $request)
	{
		if($request['type'] == 1 ) 
			$type = 'Hospital';
		else
			$type = 'Laboratory';
		$month = $request['month'];
		$year = $request['year'];
		$date = $year .'-'. $month  ; 
		$stockEntry = DB::table('stocks')
					->join('stock_entries' , 'stocks.id', '=' , 'stock_entries.stock_id')
					->where('stock_entries.type' , '=' , $request['type'])
					->whereMonth('stock_entries.created_at' , '=' , $month)
					->whereYear('stock_entries.created_at','=',$year)
					->get();

		return view('admin.monthly_entry_stock',['stockEntries' => $stockEntry , 'type'=> $type , 'date' => $date]);
	}

	public function monthlyDelivaryStock(Request $request)
	{
		if($request['type'] == 1 ) 
			$type = 'Hospital';
		else
			$type = 'Laboratory';
		$month = $request['month'];
		$year = $request['year'];
		$date = $year .'-'. $month ; 
		$stockDelivary = DB::table('stocks')
					->join('stock_delivaries' , 'stocks.id' , '=' , 'stock_delivaries.stock_id')
					->where('stock_delivaries.type' , '=' , $request['type'])
					->whereMonth('stock_delivaries.created_at' , '=' , $month)
					->whereYear('stock_delivaries.created_at','=',$year)
					->get();
		return view('admin.monthly_delivary_stock',['stockDelivaries' => $stockDelivary,'type' => $type,'date'=>$date]);
	}

	// end stock section 

	public function dailyEntrypharmacy()
	{
		return view('admin.daily_entry_pharmacy');
	}

	public function dailyDelivarypharmacy()
	{
		return view('admin.daily_delivary_pharmacy');
	}

	public function monthlyEntrypharmacy()
	{
		return view('admin.monthly_entry_pharmacy');
	}

	public function monthlyDelivarypharmacy()
	{
		return view('admin.monthly_delivary_pharmacy');
	}
}