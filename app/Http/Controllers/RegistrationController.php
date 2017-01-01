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
		$user->outdoor_id = $request['outdoor_id'];
		$user->indoor_id = $request['indoor_id'];
		$user->rf_id = $request['rf_id'];
		$user->refund_id = $request['refund_id'];
		$user->accounce_id = $request['accounce_id'];
		$user->stock_id = $request['stock_id'];
		$user->data_entry_id = $request['data_entry_id'];

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
		$user->outdoor_id = $request['outdoor_id'];
		$user->indoor_id = $request['indoor_id'];
		$user->rf_id = $request['rf_id'];
		$user->refund_id = $request['refund_id'];
		$user->accounce_id = $request['accounce_id'];
		$user->stock_id = $request['stock_id'];
		$user->data_entry_id = $request['data_entry_id'];
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