<?php 

namespace App\Http\Controllers;

use App\Http\Requests\Request;

class DoctorController extends Controller
{
    public function getIndex ()
    {
        return view('admin.doctor');
    }

    public function save(Requestquest $request)
    {
    	$this->validate($request , [
    		'name' 		=> 'required|max:200',
    		'degree'	=> 'required|max:100',
    		'gender' 	=> 'required',
    		'birthDate'	=> 'required',
    		'charge'	=> 'required|number',
    		'mobile'	=> 'required|number',
    		'email'		=> 'required|email'
    	]);

    	$doctor 		   = new Doctor();
    	$doctor->name 	   = ucfirst($request['name']);
    	$doctor->degree    = $request['degree'];
    	$doctor->gender	   = $request['gender'];
    	$doctor->birthDate = $request['birthDate'];
    	$doctor->charge	   = $request['charge'];
    	$doctor->mobile	   = $request['mobile'];
    	$doctor->email	   = $request['email'];    	
    	$doctor->hAddress  = $request['hAddress'];
    	$doctor->oaddress  = $request['oaddress'];
    	$doctor->specialist = $request['specialist'];
    	$doctor->save();
    }
}
