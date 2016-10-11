<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use Carbon\Carbon;
use App\Marketing;
use App\Patientout;
use App\ReportType;
class InvoiceoutController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();
        $marketings = Marketing::all();
        return view('admin.invoiceout',['doctors'=>$doctors, 'marketings'=>$marketings]);
    }


    public function show()
    {
        $invoiceout = invoiceout::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.invoiceout' , ['invoiceouts' => $invoiceout]);
    }

    public function store(Request $request) 
    {
        date_default_timezone_set("Asia/Dhaka");
        $invoiceout = new invoiceout();
        $invoiceout->name = $request['name'];
        $invoiceout->mobile = $request['mobile'];
        $invoiceout->address = $request['address'];
        $invoiceout->doctor_id = $request['doctor_id'];
        $invoiceout->save();
        return redirect()->back()->with(['success1' => 'Insert Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $invoiceout = invoiceout::find($id);
        $invoiceout->name = $request['name'];
        $invoiceout->mobile = $request['mobile'];
        $invoiceout->address = $request['address'];
        $invoiceout->doctor_id = $request['doctor_id'];
        $invoiceout->save();
        return redirect()->back()->with(['success' => 'Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $invoiceout = invoiceout::find($id);
        if(!$invoiceout){
            return redirect()->route('invoiceout.index')->with(['fail' => 'Page not found !']);
        }
        $invoiceout->delete();
        return redirect()->route('invoiceout.index')->with(['success' => 'Deleted Successfully.']);
    }

    public function autocomplete(Request $request)
    {
        $term = $request->name_startsWith;
        $data = invoiceType::where('name','LIKE','%'.$term.'%')->take(10)->get();
        $results = array();
        foreach ($data as $key => $v) {
            $results[] = ['id'=>$v->id ,'value'=>$v->name , 'cost'=>$v->cost,'room'=>$v->room];
        }
        return response()->json($results);
    }

}