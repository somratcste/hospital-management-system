<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Illuminate\Support\Facades\Input;
use File;
class PatientController extends Controller
{
    public function getIndex ()
    {
        return view('admin.patient');
    }

    public function save(Request $request)
    {
    	$this->validate($request , [
            'patient_type' => 'required',
    		'name' 		=> 'required|max:200',
    		'gender' 	=> 'required',
    		'birthDate'	=> 'required',
            'symptoms'  => 'required',
    		'mobile'	=> 'required',
            'address'   => 'required'
    	]);

    	$patient 		   = new Patient();
        $patient->patient_type = $request['patient_type'];
    	$patient->name 	   = ucfirst($request['name']);
    	$patient->gender	   = $request['gender'];
    	$patient->birthDate = $request['birthDate'];
        $patient->bloodGroup = $request['bloodGroup'];
        $patient->symptoms = $request['symptoms'];
        $patient->date = $request['date'];
        $patient->time = $request['time'];
    	$patient->mobile	   = $request['mobile'];
    	$patient->email	   = $request['email'];    	
    	$patient->address  = $request['address'];
    	$patient->doctor_id = $request['doctor_id'];
        $patient->seat_id = $request['seat_id'];
        if(Input::hasFile('image')){

            $file = Input::file('image');
            $file->move(public_path(). '/images/patients',$file->getClientOriginalName());

            $patient->image = $file->getClientOriginalName();
            $patient->size = $file->getClientsize();
            $patient->type = $file->getClientMimeType();
        }
    	$patient->save();

    	return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request)
    {
       $this->validate($request , [
            'patient_type' => 'required',
            'name'      => 'required|max:200',
            'gender'    => 'required',
            'birthDate' => 'required',
            'symptoms'  => 'required',
            'mobile'    => 'required',
            'address'   => 'required'
        ]);


        $patient            = Patient::find($request['patient_id']);
        $patient->patient_type = $request['patient_type'];
        $patient->name     = ucfirst($request['name']);
        $patient->gender       = $request['gender'];
        $patient->birthDate = $request['birthDate'];
        $patient->bloodGroup = $request['bloodGroup'];
        $patient->symptoms = $request['symptoms'];
        $patient->date = $request['date'];
        $patient->time = $request['time'];
        $patient->mobile       = $request['mobile'];
        $patient->email    = $request['email'];     
        $patient->address  = $request['address'];
        $patient->doctor_id = $request['doctor_id'];
        $patient->seat_id = $request['seat_id'];
        if(Input::hasFile('image')){

            if($patient->image){
                $image_path = public_path().'/images/patients/'.$patient->image;
                unlink($image_path);
            }
            $file = Input::file('image');
            $file->move(public_path(). '/images/patients',$file->getClientOriginalName());

            $patient->image = $file->getClientOriginalName();
            $patient->size = $file->getClientsize();
            $patient->type = $file->getClientMimeType();
        }
        $patient->update();
        return redirect()->route('patient.list' , ['patient' => $patient->patient_type])->with(['success' => 'Updated Successfully'] );
    }

    public function viewList($patient_type = null)
    {
        if($patient_type == 'admit')
            $patient_type = 1;
        else if ($patient_type == 'out')
            $patient_type = 2;
        $patient = Patient::orderBy('created_at' , 'desc')->where('patient_type' , $patient_type)->paginate(50);
        return view('admin.patient_list' , ['patients' => $patient , 'patient_type' => $patient_type]);
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
