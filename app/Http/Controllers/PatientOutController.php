<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patientout;
use App\Doctor;

class PatientoutController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();
        $patientout = Patientout::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.patientout' , ['patientouts' => $patientout, 'doctors' => $doctors]);
    }


    public function show()
    {
        $patientout = Patientout::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.patientout' , ['patientouts' => $patientout]);
    }

    public function store(Request $request) 
    {
        $patientout = new Patientout();
        $patientout->name = $request['name'];
        $patientout->mobile = $request['mobile'];
        $patientout->address = $request['address'];
        $patientout->doctor_id = $request['doctor_id'];
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