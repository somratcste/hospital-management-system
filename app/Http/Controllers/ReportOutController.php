<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reportout;
use App\Doctor;
use Carbon\Carbon;
use App\Marketing;
use App\Patientout;
use App\ReportType;
class reportoutController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();
        $marketings = Marketing::all();
        $patientouts = Patientout::all();
        // $reportout = Reportout::whereDate('created_at' , '=' , Carbon::today()->toDateString())->orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.reportout',['doctors'=>$doctors, 'marketings'=>$marketings, 'patientouts'=>$patientouts]);
    }


    public function show()
    {
        $reportout = Reportout::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.reportout' , ['reportouts' => $reportout]);
    }

    public function store(Request $request) 
    {
        date_default_timezone_set("Asia/Dhaka");
        $reportout = new Reportout();
        $reportout->name = $request['name'];
        $reportout->mobile = $request['mobile'];
        $reportout->address = $request['address'];
        $reportout->doctor_id = $request['doctor_id'];
        $reportout->save();
        return redirect()->back()->with(['success1' => 'Insert Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $reportout = Reportout::find($id);
        $reportout->name = $request['name'];
        $reportout->mobile = $request['mobile'];
        $reportout->address = $request['address'];
        $reportout->doctor_id = $request['doctor_id'];
        $reportout->save();
        return redirect()->back()->with(['success' => 'Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $reportout = Reportout::find($id);
        if(!$reportout){
            return redirect()->route('reportout.index')->with(['fail' => 'Page not found !']);
        }
        $reportout->delete();
        return redirect()->route('reportout.index')->with(['success' => 'Deleted Successfully.']);
    }

    public function autocomplete(Request $request)
    {
        $term = $request->term;
        $data = ReportType::where('name','LIKE','%'.$term.'%')->take(10)->get();
        $results = array();
        foreach ($data as $key => $v) {
            $results[] = ['id'=>$v->id, 'value'=>$v->name , 'cost'=>$v->cost];
        }
        return response()->json($results);
    }

}