<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\StockEntry;
use DB;
use App\StockDelivary;


class TotalReportController extends Controller
{ 
	public function dailyEntryHospital()
	{
		return view('admin.daily_entry_hospital');
	}

	public function dailyDelivaryHospital()
	{
		return view('admin.daily_delivary_hospital');
	}

	public function monthlyEntryHospital()
	{
		return view('admin.monthly_entry_hospital');
	}

	public function monthlyDelivaryHospital()
	{
		return view('admin.monthly_delivary_hospital');
	}

	// start stock section 

	public function dailyEntryStock()
	{
		$stockEntry = DB::table('stocks')
					->join('stock_entries' , 'stocks.id', '=' , 'stock_entries.stock_id')
					->where('stock_entries.type' , '=' , 1)
					->get();
		return view('admin.daily_entry_stock',['stockEntries' => $stockEntry]);
	}

	public function dailyDelivaryStock()
	{
		$stockDelivary = DB::table('stocks')
					->join('stock_delivaries' , 'stocks.id' , '=' , 'stock_delivaries.stock_id')
					->where('stock_delivaries.type' , '=' , 1)
					->get();
		return view('admin.daily_delivary_stock',['stockDelivaries' => $stockDelivary]);
	}

	public function monthlyEntryStock()
	{
		return view('admin.monthly_entry_stock');
	}

	public function monthlyDelivaryStock()
	{
		return view('admin.monthly_delivary_stock');
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