<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Specialist;
use Carbon\Carbon;
use DB;
use App\Patientout;
class doctorController extends Controller
{

    public function index()
    {
        $specialists = Specialist::all();
        $doctor = Doctor::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.doctor' , ['doctors' => $doctor, 'specialists' => $specialists]);
    }


    public function show()
    {
        $doctor = Doctor::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.doctor' , ['doctors' => $doctor]);
    }

    public function store(Request $request) 
    {
        $doctor = new Doctor();
        $doctor->name = $request['name'];
        $doctor->degree = $request['degree'];
        $doctor->mobile = $request['mobile'];
        $doctor->charge = $request['charge'];
        $doctor->specialist_id = $request['specialist_id'];
        $doctor->save();
        return redirect()->back()->with(['success1' => 'Insert Successfully'] );
    }

    public function update(Request $request,$id)
    {
        $doctor = Doctor::find($id);
        $doctor->name = $request['name'];
        $doctor->degree = $request['degree'];
        $doctor->mobile = $request['mobile'];
        $doctor->charge = $request['charge'];
        $doctor->specialist_id = $request['specialist_id'];
        $doctor->save();
        return redirect()->back()->with(['success' => 'Updtaed Successfully'] );
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        if(!$doctor){
            return redirect()->route('doctor.index')->with(['fail' => 'Page not found !']);
        }
        $doctor->delete();
        return redirect()->route('doctor.index')->with(['success' => 'Deleted Successfully.']);
    }

    public function create(Request $request)
    {
        $year = $request['year'];
        $month = $request['month'];
        $day = $request['day'];
        $doctor_id = $request['doctor_id'];
        $doctor = Doctor::Find($doctor_id);
        $patients = Patientout::whereYear('created_at' , '=' , $year)
                              ->whereMonth('created_at' , '=' , $month)
                              ->whereDay('created_at' , '=' , $day)
                              ->where('doctor_id' , $doctor_id)
                              ->orderBy('created_at' , 'asc')
                              ->paginate(50);
        return view('admin.visiting_list' , ['patients' => $patients , 'doctor' => $doctor , 'year' => $year , 'month' => $month , 'day' => $day]);
    }

}