<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OperationType;
use Illuminate\Support\Facades\Input;
use App\Operation;
use App\Doctor; 
use Auth;

class OperationController extends Controller
{
    public function operationTypeIndex ()
    {
        return view('admin.operationType');
    }

    public function operationTypesave(Request $request)
    {
    	$this->validate($request , [
            'name' => 'required',
    		'cost' => 'required'
    	]);

    	$operation 		   = new OperationType();
    	$operation->name 	   = ucfirst($request['name']);
    	$operation->cost    = $request['cost'];
    	$operation->save();

    	return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function operationTypeupdate(Request $request)
    {
       $this->validate($request , [
            'name' => 'required',
            'cost' => 'required'
        ]);


        $operation            = OperationType::find($request['operationType_id']);
        $operation->name      = ucfirst($request['name']);
        $operation->cost    = $request['cost'];
        $operation->update();
        return redirect()->route('operationType.list')->with(['success' => 'Updated Successfully'] );
    }

    public function operationTypeViewList()
    {
        $operation = OperationType::orderBy('created_at' , 'desc')->paginate(50);
        return view('admin.operationType_list' , ['operationTypes' => $operation]);

    }

    public function operationTypedelete(Request $request)
    {
        $operation = OperationType::find($request['operationType_id']);
        if(!$operation){
            return redirect()->route('operationType.list')->with(['fail' => 'Page not found !']);
        }

        $operation->delete();
        return redirect()->route('operationType.list')->with(['success' => 'Deleted Information Successfully !']);

    }

    //operation Controller 
    
    public function getIndex ()
    {
        $doctors = Doctor::all();
        $operationtypes = OperationType::all();
        return view('admin.operation',['doctors'=>$doctors,'operationtypes'=>$operationtypes]);
    }

    public function save(Request $request)
    {
        $this->validate($request , [
            'patient_id' => 'required',
            'operationType_id' => 'required',
            'doctor_id' => 'required',
            'dateTime' => 'required'
        ]);

        $operation          = new Operation();
        $operation->patient_id      = $request['patient_id'];
        $operation->operation_type_id   = $request['operationType_id'];
        $operation->doctor_id = $request['doctor_id'];
        $operation->dateTime = $request['dateTime'];
        $operation->user_id = Auth::user()->id;
        $operation->save();

        return redirect()->back()->with(['success' => 'Insert Successfully'] );
    }

    public function update(Request $request)
    {
       $this->validate($request , [
            'operationType_id' => 'required',
            'doctor_id' => 'required',
            'dateTime' => 'required'
        ]);


        $operation  = Operation::find($request['operation_id']);
        $operation->operation_type_id    = $request['operationType_id'];
        $operation->doctor_id = $request['doctor_id'];
        $operation->dateTime = $request['dateTime'];
        $operation->user_id = Auth::user()->id;
        $operation->update();
        return redirect()->route('operation.list')->with(['success' => 'Updated Successfully'] );
    }

    public function viewList($operationFloor = null)
    {
        $operation = Operation::orderBy('created_at' , 'desc')->paginate(50);
        $operationtypes = OperationType::all();
        $doctors = Doctor::all();
        return view('admin.operation_list' , ['operations' => $operation,'doctors'=>$doctors,'operationtypes'=> $operationtypes]);
    }

    public function delete(Request $request)
    {
        $operation = Operation::find($request['operation_id']);
        if(!$operation){
            return redirect()->route('operation.list')->with(['fail' => 'Page not found !']);
        }

        $operation->delete();
        return redirect()->route('operation.list')->with(['success' => 'Deleted Information Successfully !']);

    }
}
