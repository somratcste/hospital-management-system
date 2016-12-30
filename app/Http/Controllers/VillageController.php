<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Village;
use App\Marketing;
use App\InvoiceOut;
use App\InvoiceOutProduct;
use DB;

class villageController extends Controller
{

    public function index()
    {
        $marketings = Marketing::all();
        $village = village::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.village' , ['villages' => $village, 'marketings' => $marketings]);
    }


    public function show()
    {
        $village = Village::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.village' , ['villages' => $village]);
    }

    public function store(Request $request) 
    {
        $village = new Village();
        $village->name = $request['name'];
        $village->pharmacy = $request['pharmacy'];
        $village->market = $request['market'];
        $village->address = $request['address'];
        $village->mobile = $request['mobile'];
        $village->marketing_id = $request['marketing_id'];
        $village->save();
        return redirect()->back()->with(['success1' => 'Insert Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $village = Village::find($id);
        $village->name = $request['name'];
        $village->pharmacy = $request['pharmacy'];
        $village->market = $request['market'];
        $village->address = $request['address'];
        $village->mobile = $request['mobile'];
        $village->marketing_id = $request['marketing_id'];
        $village->save();
        return redirect()->back()->with(['success' => 'Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $village = Village::find($id);
        if(!$village){
            return redirect()->route('village.index')->with(['fail' => 'Page not found !']);
        }
        $village->delete();
        return redirect()->route('village.index')->with(['success' => 'Deleted Successfully.']);
    }

    public function create(Request $request)
    {
        if($request['type'] == 1) {
            $year = $request['year'];
            $month = $request['month'];
            $day = $request['day'];
            $date = $year.'-'.$month.'-'.$day;
            $village_id = $request['village_id'];
            $marketing_id = $request['marketing_id'];
            $village = Village::Find($village_id);

            $invoiceouts = DB::table('invoice_out_products')
                        ->join('invoice_outs','invoice_out_id','=' ,'invoice_outs.id')
                        ->where('village_id' , $village_id)
                        ->where('marketing_id',$marketing_id)
                        ->whereDate('invoice_outs.created_at','=',$date)
                        ->select('*',DB::raw('SUM(report_cost*report_discount/100) as totalRf'))
                        ->groupBy('invoice_out_id')
                        ->orderBy('invoice_outs.created_at' , 'desc')
                        ->get();

            return view('admin.village_visiting_list' , ['invoiceouts' => $invoiceouts , 'village' => $village , 'year' => $year , 'month' => $month , 'day' => $day]);
        } else {
            $year = $request['year'];
            $month = $request['month'];
            $day = $request['day'];
            $village_id = $request['village_id'];
            $village = Village::Find($village_id);
            $marketing_id = $request['marketing_id'];

            $invoiceouts = DB::table('invoice_out_products')
                        ->join('invoice_outs','invoice_out_id','=' ,'invoice_outs.id')
                        ->where('village_id' , $village_id)
                        ->where('marketing_id',$marketing_id)
                        ->whereYear('invoice_outs.created_at','=',date('Y'))
                        ->whereMonth('invoice_outs.created_at','=',date('m'))
                        ->select('*',DB::raw('SUM(report_cost*report_discount/100) as totalRf'))
                        ->groupBy('invoice_out_id')
                        ->orderBy('invoice_outs.created_at' , 'desc')
                        ->get();

            return view('admin.village_visiting_list' , ['invoiceouts' => $invoiceouts , 'village' => $village , 'year' => $year , 'month' => $month , 'day' => $day]);

        }
    }

}