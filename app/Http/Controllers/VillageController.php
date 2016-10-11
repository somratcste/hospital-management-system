<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Village;
use App\Marketing;
use App\InvoiceOut;

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
        $village->mobile = $request['mobile'];
        $village->marketing_id = $request['marketing_id'];
        $village->save();
        return redirect()->back()->with(['success1' => 'Insert Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $village = Village::find($id);
        $village->name = $request['name'];
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
        $year = $request['year'];
        $month = $request['month'];
        $day = $request['day'];
        $village_id = $request['village_id'];
        $village = Village::Find($village_id);
        $invoiceouts = InvoiceOut::whereYear('created_at' , '=' , $year)
                              ->whereMonth('created_at' , '=' , $month)
                              ->whereDay('created_at' , '=' , $day)
                              ->where('village_id' , $village_id)
                              ->orderBy('created_at' , 'asc')
                              ->paginate(50);
        return view('admin.village_visiting_list' , ['invoiceouts' => $invoiceouts , 'village' => $village , 'year' => $year , 'month' => $month , 'day' => $day]);
    }

}