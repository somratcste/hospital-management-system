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
    		'email'		=> 'required'
    	]);
    }
}
