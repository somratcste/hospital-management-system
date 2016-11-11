<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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