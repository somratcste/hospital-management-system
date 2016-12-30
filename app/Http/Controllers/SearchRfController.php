<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceOut;
use App\Marketing;

class SearchRfController extends Controller
{
	public function index()
	{
    $marketings = Marketing::all();
    return view('admin.search_rf',['marketings'=>$marketings]);
	}

	public function create()
	{
    $marketings = Marketing::all();
		return view('admin.search_rf_marketing',['marketings'=>$marketings]);
	}

	public function autocomplete_marketing(Request $request)
	{
		$term = $request->term ;
        $data =  Marketing::where('id','LIKE','%'.$term.'%')
        ->orWhere('name','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $results = array();
        foreach ($data as $value) {
            $results[] = ['label' => $value->name .'-'. $value->mobile ,'marketing_id' =>$value->id ];
        }
        return response()->json($results);
	}

	public function view(Request $request)
	{
    if($request['type'] == 2) {
      $year = $request['year'];
      $month = $request['month'];
      $marketing_id = $request['marketing_id'];
      $marketing = Marketing::Find($marketing_id);
      $invoiceouts = InvoiceOut::whereYear('created_at' , '=' , $year)
                            ->whereMonth('created_at' , '=' , $month)
                            ->where('marketing_id' , $marketing_id)
                            ->orderBy('created_at' , 'asc')
                            ->get();
      return view('admin.marketing_visiting_list' , ['invoiceouts' => $invoiceouts , 'marketing' => $marketing , 'year' => $year , 'month' => $month]);
    } else {
      $year = $request['year'];
      $month = $request['month'];
      $day = $request['day'];
      $date = $year.'-'.$month.'-'.$day;
      $marketing_id = $request['marketing_id'];
      $marketing = Marketing::Find($marketing_id);
      $invoiceouts = InvoiceOut::whereDate('created_at','=',$date)
                            ->where('marketing_id' , $marketing_id)
                            ->orderBy('created_at' , 'asc')
                            ->get();
      return view('admin.marketing_visiting_list' , ['invoiceouts' => $invoiceouts , 'marketing' => $marketing , 'year' => $year , 'month' => $month]);
    }
	}

}