<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class RegistrationController extends Controller
{
	public function index()
	{
		return view('admin.user_registration');
	}

	public function store(Request $request)
	{
		$this->validate($request , [
            'name' => 'unique:users'
    	]);
		$user = new User();
		$user->name = $request['name'];
		$user->email = $request['email'];
		$user->password = bcrypt($request['password']);
		$user->outdoor_patient_id = $request['outdoor_patient_id'];
		$user->rf_id = $request['rf_id'];
		$user->doctor_id = $request['doctor_id'];
		$user->indoor_patient_id = $request['indoor_patient_id'];
		$user->employee_id = $request['employee_id'];
		$user->seat_id = $request['seat_id'];
		$user->test_id = $request['test_id'];
		$user->operation_id = $request['operation_id'];
		$user->invoice_id = $request['invoice_id'];
		$user->pharmacy_id = $request['pharmacy_id'];
		$user->user_id = $request['user_id'];
		$user->save();
		return redirect()->back()->with(['success' => 'Create New User Successfully'] );
	}

	public function show()
	{
		$test = "hi";
		dd($test);
	}
}