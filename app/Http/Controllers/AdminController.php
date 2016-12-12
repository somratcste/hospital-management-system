<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

class AdminController extends Controller {

	public  function __construct()
	{
		date_default_timezone_set("Asia/Dhaka");
	}
	public function index()
	{
		$day = Carbon::today()->day;
		$month = Carbon::today()->month;
		$year = Carbon::today()->year;
		return view('admin.index',['day'=> $day , 'month' => $month, 'year' => $year]);
	}
}