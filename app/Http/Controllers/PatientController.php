<?php 

namespace App\Http\Controllers;

use App\Employee;
use App\Patient;
use App\Seat;
use App\Doctor;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Ecategory;
class PatientController extends Controller
{
    
    public function getIndex ()
    {
        $doctors = Doctor::all();
        $seat = Seat::orderBy('created_at' , 'desc')->where('status' , 'empty')->get();
        $patient = Patient::orderBy('created_at' , 'desc')->first();
        return view('admin.patient' , ['doctors' => $doctors , 'seats' => $seat , 'lastID' => $patient->id+2 ]);
    }

    public function save(Request $request)
    {
    	$this->validate($request , [
    		'name' 		=> 'required|max:200',
    		'gender' 	=> 'required',
    		'pphone'	=> 'required',
    	]);
        date_default_timezone_set("Asia/Dhaka");
    	$patient 		   = new Patient();
    	$patient->name 	   = ucfirst($request['name']);
        $patient->fh = $request['fh'];
        $patient->fname = $request['fname'];
        $patient->bloodGroup = $request['bloodGroup'];
    	$patient->gender	   = $request['gender'];
        $patient->age = $request['age'];
        $patient->occupation = $request['occupation'];
        $patient->religion = ucfirst($request['religion']); 
        $patient->laddress = $request['laddress'];
        $patient->paddress = $request['paddress'];
        $patient->hphone = $request['hphone'];
        $patient->pphone = $request['pphone'];
        $patient->doctor_id = $request['doctor_id'];
        $patient->seat_id = $request['seat_id'];  	
       
    	$patient->save();

    	return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request)
    {
       
    }

    public function viewList()
    {
        $patient = Patient::orderBy('created_at' , 'desc')->paginate(50);
        $doctors = Doctor::all();
        $seat = Seat::all();
        return view('admin.patient_list' , ['patients' => $patient , 'doctors' => $doctors , 'seats' => $seat]);
    }

    public function delete(Request $request)
    {
        $patient = Patient::find($request['patient_id']);
        if(!$patient){
            return redirect()->route('patient.list')->with(['fail' => 'Page not found !']);
        }
        if($patient->image){
            $image_path = public_path().'/images/patients/'.$patient->image;
            unlink($image_path);
        }
        $patient->delete();
        return redirect()->route('patient.list' , ['patient' => $patient->patient_type ])->with(['success' => 'Deleted Information Successfully !']);

    }
}
