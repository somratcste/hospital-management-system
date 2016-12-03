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
		$user->outdoor_patient_edit_id = $request['outdoor_patient_edit_id'];
		$user->outdoor_patient_delete_id = $request['outdoor_patient_delete_id'];
		$user->rf_id = $request['rf_id'];
		$user->rf_edit_id = $request['rf_edit_id'];
		$user->rf_delete_id = $request['rf_delete_id'];
		$user->refund_id = $request['refund_id'];
		$user->doctor_id = $request['doctor_id'];
		$user->doctor_edit_id = $request['doctor_edit_id'];
		$user->doctor_delete_id = $request['doctor_delete_id'];
		$user->indoor_patient_id = $request['indoor_patient_id'];
		$user->indoor_patient_edit_id = $request['indoor_patient_edit_id'];
		$user->indoor_patient_delete_id = $request['indoor_patient_delete_id'];
	 	$user->employee_id = $request['employee_id'];
		$user->employee_edit_id = $request['employee_edit_id'];
		$user->employee_delete_id = $request['employee_delete_id'];
		$user->seat_id = $request['seat_id'];
		$user->seat_edit_id = $request['seat_edit_id'];
		$user->seat_delete_id = $request['seat_delete_id'];
		$user->test_id = $request['test_id'];
		$user->test_edit_id = $request['test_edit_id'];
		$user->test_delete_id = $request['test_delete_id'];
		$user->operation_id = $request['operation_id'];
		$user->operation_edit_id = $request['operation_edit_id'];
		$user->operation_delete_id = $request['operation_delete_id'];
		$user->invoice_id = $request['invoice_id'];
		$user->invoice_edit_id = $request['invoice_edit_id'];
		$user->invoice_delete_id = $request['invoice_delete_id'];
		$user->pharmacy_id = $request['pharmacy_id'];
		$user->user_id = $request['user_id'];
		$user->stock_id = $request['stock_id'];
		$user->save();
		return redirect()->route('user.create')->with(['success' => 'Create New User Successfully'] );
	}

	public function create()
	{
		$users = User::orderBy('created_at' , 'desc')->where('name' , '!=' , 'super' )->paginate(50);
		return view('admin.user_list',['users' => $users]);
	}

	public function destroy($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('user.create')->with(['fail' => 'Page not found !']);
        }
        $user->delete();
        return redirect()->route('user.create')->with(['success' => 'User Deleted Successfully.']);
    }

    public function update(Request $request,$id)
    {

		$user = User::find($id);
		$user->email = $request['email'];
		$user->outdoor_patient_id = $request['outdoor_patient_id'];
		$user->outdoor_patient_edit_id = $request['outdoor_patient_edit_id'];
		$user->outdoor_patient_delete_id = $request['outdoor_patient_delete_id'];
		$user->rf_id = $request['rf_id'];
		$user->rf_edit_id = $request['rf_edit_id'];
		$user->rf_delete_id = $request['rf_delete_id'];
		$user->refund_id = $request['refund_id'];
		$user->doctor_id = $request['doctor_id'];
		$user->doctor_edit_id = $request['doctor_edit_id'];
		$user->doctor_delete_id = $request['doctor_delete_id'];
		$user->indoor_patient_id = $request['indoor_patient_id'];
		$user->indoor_patient_edit_id = $request['indoor_patient_edit_id'];
		$user->indoor_patient_delete_id = $request['indoor_patient_delete_id'];
	 	$user->employee_id = $request['employee_id'];
		$user->employee_edit_id = $request['employee_edit_id'];
		$user->employee_delete_id = $request['employee_delete_id'];
		$user->seat_id = $request['seat_id'];
		$user->seat_edit_id = $request['seat_edit_id'];
		$user->seat_delete_id = $request['seat_delete_id'];
		$user->test_id = $request['test_id'];
		$user->test_edit_id = $request['test_edit_id'];
		$user->test_delete_id = $request['test_delete_id'];
		$user->operation_id = $request['operation_id'];
		$user->operation_edit_id = $request['operation_edit_id'];
		$user->operation_delete_id = $request['operation_delete_id'];
		$user->invoice_id = $request['invoice_id'];
		$user->invoice_edit_id = $request['invoice_edit_id'];
		$user->invoice_delete_id = $request['invoice_delete_id'];
		$user->pharmacy_id = $request['pharmacy_id'];
		$user->user_id = $request['user_id'];
		$user->stock_id = $request['stock_id'];
		$user->save();
		return redirect()->back()->with(['success' => 'Updtaed Successfully'] );

    }

    public function show()
    {
    	$users = User::orderBy('created_at' , 'desc')->where('name' , '!=' , 'super' )->paginate(50);
		return view('admin.user_list',['users' => $users]);
    }

    public function password_reset(Request $request)
    {
    	$user = User::find($request['user_id']);
		$user->password = bcrypt($request['password']);
		$user->update();
		return redirect()->back()->with(['success' => 'Password Reset Successfully'] );
    }
}