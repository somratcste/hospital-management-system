<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Village;
use App\Marketing;
use App\InvoiceOut;
use App\Doctor;

class SearchRfController extends Controller
{
	public function index()
	{
		$doctors = Doctor::all();
        $marketings = Marketing::all();
        $report_id = InvoiceOut::orderBy('created_at','desc')->first();
        $report_id = $report_id->id +1;
        return view('admin.search_rf',['doctors'=>$doctors, 'marketings'=>$marketings,'report_id'=>$report_id]);
	}

}