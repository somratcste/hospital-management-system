<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patientout;
use App\Doctor;
use Carbon\Carbon;

class PatientoutController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();
        $patientout = Patientout::whereDate('created_at' , '=' , Carbon::today()->toDateString())->orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.patientout' , ['patientouts' => $patientout, 'doctors' => $doctors]);
    }


    public function show()
    {
        $patientout = Patientout::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.patientout' , ['patientouts' => $patientout]);
    }

    public function store(Request $request) 
    {
        date_default_timezone_set("Asia/Dhaka");
        $patientout = new Patientout();
        $patientout->name = $request['name'];
        $patientout->mobile = $request['mobile'];
        $patientout->address = $request['address'];
        $patientout->doctor_id = $request['doctor_id'];
        $patientout->receive_cash = $request['receive_cash'];
        $patientout->save();
        return redirect()->back()->with(['success1' => 'Insert Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $patientout = Patientout::find($id);
        $patientout->name = $request['name'];
        $patientout->mobile = $request['mobile'];
        $patientout->address = $request['address'];
        $patientout->doctor_id = $request['doctor_id'];
        $patientout->save();
        return redirect()->back()->with(['success' => 'Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $patientout = Patientout::find($id);
        if(!$patientout){
            return redirect()->route('patientout.index')->with(['fail' => 'Page not found !']);
        }
        $patientout->delete();
        return redirect()->route('patientout.index')->with(['success' => 'Deleted Successfully.']);
    }

}