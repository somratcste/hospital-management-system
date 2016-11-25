<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Input;
use File;
use App\Ecategory;
class EmployeeController extends Controller
{
    public function getIndex ()
    {
        $ecategorys = Ecategory::all();
        return view('admin.employee' , ['ecategorys' => $ecategorys]);
    }

    public function save(Request $request)
    {
    	$this->validate($request , [
    		'name' 		=> 'required|max:200',
    		'degree'	=> 'required|max:100',
    		'gender' 	=> 'required',
    		'birthDate'	=> 'required',
    		'mobile'	=> 'required|numeric',
    		'email'		=> 'required|email'
    	]);

    	$employee 		   = new Employee();
    	$employee->name 	   = ucfirst($request['name']);
    	$employee->degree    = $request['degree'];
    	$employee->gender	   = $request['gender'];
    	$employee->birthDate = $request['birthDate'];
        // $employee->charge    = $request['charge'];
    	$employee->mobile	   = $request['mobile'];
    	$employee->email	   = $request['email'];    	
    	$employee->hAddress  = $request['hAddress'];
    	$employee->oaddress  = $request['oAddress'];
    	// $employee->specialist = $request['specialist'];
        $employee->ecategory_id = $request['ecategory_id'];
        if(Input::hasFile('image')){

            $file = Input::file('image');
            $file->move(public_path(). '/images/employees',$file->getClientOriginalName());

            $employee->image = $file->getClientOriginalName();
            $employee->size = $file->getClientsize();
            $employee->type = $file->getClientMimeType();
        }
    	$employee->save();

    	return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request)
    {
       $this->validate($request , [
            
            'name'      => 'required|max:200',
            'degree'    => 'required|max:100',
            'gender'    => 'required',
            'birthDate' => 'required',
            'mobile'    => 'required',
            'email'     => 'required|email'
        ]);


        $employee            = Employee::find($request['employee_id']);
        $employee->name      = ucfirst($request['name']);
        $employee->degree    = $request['degree'];
        $employee->gender    = $request['gender'];
        $employee->birthDate = $request['birthDate'];
        $employee->charge    = $request['charge'];
        $employee->mobile    = $request['mobile'];
        $employee->email     = $request['email'];     
        $employee->hAddress  = $request['hAddress'];
        $employee->oaddress  = $request['oAddress'];
        $employee->specialist = $request['specialist'];
        $employee->ecategory_id = $request['ecategory_id'];
        if(Input::hasFile('image')){

            if($employee->image){
                $image_path = public_path().'/images/employees/'.$employee->image;
                unlink($image_path);
            }
            $file = Input::file('image');
            $file->move(public_path(). '/images/employees',$file->getClientOriginalName());

            $employee->image = $file->getClientOriginalName();
            $employee->size = $file->getClientsize();
            $employee->type = $file->getClientMimeType();
        }
        $employee->update();
        return redirect()->route('employee.list' , ['employee' => $employee->employee_type])->with(['success' => 'Updated Successfully'] );
    }

    public function viewList()
    {
        $ecategorys = Ecategory::all();
        $employee = Employee::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.employee_list' , ['employees' => $employee , 'ecategorys' => $ecategorys]);
    }

    public function delete(Request $request)
    {
        $employee = Employee::find($request['employee_id']);
        if(!$employee){
            return redirect()->route('employee.list')->with(['fail' => 'Page not found !']);
        }
        if($employee->image){
            $image_path = public_path().'/images/employees/'.$employee->image;
            unlink($image_path);
        }
        $employee->delete();
        return redirect()->route('employee.list' , ['employee' => $employee->employee_type ])->with(['success' => 'Deleted Information Successfully !']);

    }
}
